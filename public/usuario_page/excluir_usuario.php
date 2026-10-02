<?php

include "../../infra/conexao.php";

$id = $_GET['id'];

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

?>

