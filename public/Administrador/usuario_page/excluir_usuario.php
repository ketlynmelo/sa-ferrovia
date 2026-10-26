
<?php

include "../../../infra/conexao.php";

if (!isset($_SESSION['id_Usuario'], $_SESSION['tipo_conta'])) {
    header("Location: ../../../index.php");
    exit;
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: usuario.php");
    exit;
}

$id = (int) $_GET['id'];
$idUsuarioLogado = (int) $_SESSION['id_Usuario'];


if (
    $_SESSION['tipo_conta'] === 'Administrador' &&
    $id === $idUsuarioLogado
) {
    $_SESSION['erro_exclusao'] = 'Você não pode excluir sua própria conta de administrador.';
    header("Location: usuario.php");
    exit;
}



$sql = "DELETE FROM usuario WHERE id_Usuario = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
$result = mysqli_stmt_execute($stmt);


if ($result) {
    echo "Usuário excluído com sucesso.";
} else {
    echo "Erro ao excluir usuário.";
}

header("Location: usuario.php");
exit;
