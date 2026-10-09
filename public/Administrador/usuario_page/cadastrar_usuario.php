<?php

include "../../../infra/conexao.php";

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$data_nascimento = $_POST["data_nascimento"];
$endereco = $_POST["endereco"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);
var_dump(password_verify($senha, $senhaHash));
$tipo_conta = $_POST["tipo_conta"];
$status = $_POST["status"];


$sql = "INSERT INTO usuario (nome, cpf, data_nascimento, endereco, email, senha, tipo_conta, status) VALUES (?,?,?,?,?,?,?,?)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "sidsssss",
    $nome,
    $cpf,
    $data_nascimento,
    $endereco,  
    $email,
    $senhaHash,
    $tipo_conta,
    $status
);


mysqli_stmt_execute($stmt);

header("Location: usuario.php");

?>