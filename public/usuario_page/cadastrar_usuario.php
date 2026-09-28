<?php

include "../../infra/conexao.php";

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$tipo_conta = $_POST["tipo_conta"];
$status = $_POST["status"];


$sql = "INSERT INTO usuario (nome, email, senha, tipo_conta, status) VALUES (?,?,?,?,?)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "ssdsi",
    $nome,
    $email,
    $senha,
    $tipo_conta,
    $status
);


mysqli_stmt_execute($stmt);

header("Location: usuario.php");

?>