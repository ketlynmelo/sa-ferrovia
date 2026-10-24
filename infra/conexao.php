
<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "situação_aprendizagem";
$porta = 6608;

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
