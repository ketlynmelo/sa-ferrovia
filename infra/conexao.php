
<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "situação_aprendizagem";
$porta = 3308;

$conn = new mysqli(
    $host,
    $usuario,
    $senha,
    $banco,
    $porta
);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$caminhoAtual = str_replace('\\', '/', $_SERVER['SCRIPT_NAME']);
$posPublic = strpos($caminhoAtual, '/public/');

if ($posPublic !== false) {
    $caminhoBase = substr($caminhoAtual, 0, $posPublic);
    $paginaInterna = true;
} else {
    $caminhoBase = rtrim(dirname($caminhoAtual), '/');

    if ($caminhoBase === '.') {
        $caminhoBase = '';
    }

    $paginaInterna = false;
}

    
if ($paginaInterna) {

    if (
        !isset($_SESSION['id_Usuario']) ||
        !isset($_SESSION['tipo_conta'])
    ) {
        header("Location: " . $caminhoBase . "/index.php");
        exit;
    }

    $idSessao = (int) $_SESSION['id_Usuario'];

    $stmtStatus = $conn->prepare(
        "SELECT status FROM usuario WHERE id_Usuario = ?"
    );

    $stmtStatus->bind_param("i", $idSessao);
    $stmtStatus->execute();

    $resultadoStatus = $stmtStatus->get_result();
    $dadosStatus = $resultadoStatus->fetch_assoc();

    $stmtStatus->close();

    if (!$dadosStatus || $dadosStatus['status'] !== 'Ativo') {
        $_SESSION = [];

        if (ini_get('session.use_cookies')) {
            $parametros = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $parametros['path'],
                $parametros['domain'],
                $parametros['secure'],
                $parametros['httponly']
            );
        }

        session_destroy();

        header("Location: " . $caminhoBase . "/index.php");
        exit;
    }

    if (
        strpos($caminhoAtual, '/public/Administrador/') !== false &&
        $_SESSION['tipo_conta'] !== 'Administrador'
    ) {
        header("Location: " . $caminhoBase . "/index.php");
        exit;
    }

    $origem = $_SERVER['HTTP_REFERER'] ?? '';
    $hostOrigem = parse_url($origem, PHP_URL_HOST);
    $hostAtual = explode(':', $_SERVER['HTTP_HOST'] ?? '')[0];

    if (
        empty($origem) ||
        empty($hostOrigem) ||
        strcasecmp($hostOrigem, $hostAtual) !== 0
    ) {
        header("Location: " . $caminhoBase . "/index.php");
        exit;
    }
}


?>
