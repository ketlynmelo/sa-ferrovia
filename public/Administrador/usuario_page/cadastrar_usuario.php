
<?php

require_once "../../../infra/conexao.php";

$nome = trim($_POST["nome"] ?? '');
$cpf = trim($_POST["cpf"] ?? '');
$data_nascimento = $_POST["data_nascimento"] ?? '';
$endereco = trim($_POST["endereco"] ?? '');
$email = trim($_POST["email"] ?? '');
$senha = $_POST["senha"] ?? '';
$tipo_conta = $_POST["tipo_conta"] ?? '';
$status = $_POST["status"] ?? '';

$cep = trim($_POST["cep"] ?? '');
$logradouro = trim($_POST["logradouro"] ?? '');
$bairro = trim($_POST["bairro"] ?? '');
$cidade = trim($_POST["cidade"] ?? '');
$uf = strtoupper(trim($_POST["uf"] ?? ''));
$numero = trim($_POST["numero"] ?? '');

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuario
(nome, cpf, data_nascimento, endereco, email, senha,
tipo_conta, status, cep, logradouro, bairro, cidade, uf, numero)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "ssssssssssssss",
    $nome,
    $cpf,
    $data_nascimento,
    $endereco,
    $email,
    $senhaHash,
    $tipo_conta,
    $status,
    $cep,
    $logradouro,
    $bairro,
    $cidade,
    $uf,
    $numero
);

if ($stmt->execute()) {
    $stmt->close();
    header("Location: usuario.php");
    exit;
}

echo "Erro ao cadastrar usuário: " . htmlspecialchars($stmt->error);

$stmt->close();

?>
