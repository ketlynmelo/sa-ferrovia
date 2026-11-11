
<?php

require_once "../../../../infra/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome_rota = trim($_POST['nome_rota'] ?? '');
    $horario_rota = $_POST['horario_rota'] ?? '';
    $ponto_inicial = trim($_POST['ponto_inicial'] ?? '');
    $ponto_final = trim($_POST['ponto_final'] ?? '');
    $distancia = trim($_POST['distancia'] ?? '');
    $trem_id = filter_input(INPUT_POST, 'trem_id', FILTER_VALIDATE_INT);

    if (
        $nome_rota === '' ||
        $horario_rota === '' ||
        $ponto_inicial === '' ||
        $ponto_final === '' ||
        $distancia === '' ||
        !$trem_id
    ) {
        die("Preencha todos os campos corretamente.");
    }

    // Verifica se o trem existe
    $sqlVerifica = "SELECT id_Trem FROM trem WHERE id_Trem = ?";
    $stmtVerifica = mysqli_prepare($conn, $sqlVerifica);

    mysqli_stmt_bind_param($stmtVerifica, "i", $trem_id);
    mysqli_stmt_execute($stmtVerifica);

    $resultado = mysqli_stmt_get_result($stmtVerifica);
    $existe = mysqli_num_rows($resultado) > 0;

    mysqli_stmt_close($stmtVerifica);

    if (!$existe) {
        die("Trem não encontrado.");
    }

    $sql = "INSERT INTO rota
            (nome_rota, horario_rota, ponto_inicial, ponto_final, distancia, trem_id)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("Erro ao preparar cadastro: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sssssi",
        $nome_rota,
        $horario_rota,
        $ponto_inicial,
        $ponto_final,
        $distancia,
        $trem_id
    );

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        header("Location: cadastro_rotas.php?mensagem=cadastrado");
        exit;
    }

    $erro = mysqli_stmt_error($stmt);
    mysqli_stmt_close($stmt);

    die("Erro ao cadastrar rota: " . htmlspecialchars($erro));
}

?>



