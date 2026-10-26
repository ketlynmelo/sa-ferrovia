
<?php

require_once __DIR__ . '/../../../../infra/conexao.php';

$pagina = 'visualizar_trem.php';

if (
    !isset($_GET['id_Trem']) ||
    !ctype_digit((string) $_GET['id_Trem']) ||
    (int) $_GET['id_Trem'] <= 0
) {
    header("Location: $pagina?mensagem=erro");
    exit;
}

$id = (int) $_GET['id_Trem'];

$stmt = mysqli_prepare(
    $conn,
    "DELETE FROM trem WHERE id_Trem = ?"
);

if (!$stmt) {
    header("Location: $pagina?mensagem=erro");
    exit;
}

mysqli_stmt_bind_param($stmt, "i", $id);
$executou = mysqli_stmt_execute($stmt);

if ($executou && mysqli_stmt_affected_rows($stmt) === 1) {
    mysqli_stmt_close($stmt);

    header("Location: $pagina?mensagem=excluido");
    exit;
}

$codigoErro = mysqli_stmt_errno($stmt);
mysqli_stmt_close($stmt);

if ($codigoErro === 1451) {
    header("Location: $pagina?mensagem=vinculado");
} else {
    header("Location: $pagina?mensagem=erro");
}

exit;
?>
