<?php

session_start();
require_once "../../../infra/conexao.php";

$id_Usuario = (int) ($_POST['id_Usuario'] ?? 0);
$nome = trim($_POST['nome'] ?? '');
$cpf = trim($_POST['cpf'] ?? '');
$data_nascimento = $_POST['data_nascimento'] ?? '';
$endereco = trim($_POST['endereco'] ?? '');
$email = trim($_POST['email'] ?? '');
$senha = $_POST['senha'] ?? '';
$tipo_conta = $_POST['tipo_conta'] ?? '';
$status = $_POST['status'] ?? '';

if ($id_Usuario <= 0) {
    exit("ID de usuário inválido.");
}

if (
    ($_SESSION['tipo_conta'] ?? '') === 'Administrador' &&
    $id_Usuario === (int) $_SESSION['id_Usuario'] &&
    $tipo_conta !== 'Administrador'
) {
    $_SESSION['erro_permissao'] =
        'Você não pode alterar o tipo da sua própria conta.';

    header("Location: usuario.php");
    exit;
}

if (!empty($senha)) {
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "UPDATE usuario SET
        nome = ?,
        cpf = ?,
        data_nascimento = ?,
        endereco = ?,
        email = ?,
        senha = ?,
        tipo_conta = ?,
        status = ?
        WHERE id_Usuario = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssssssssi",
        $nome,
        $cpf,
        $data_nascimento,
        $endereco,
        $email,
        $senhaHash,
        $tipo_conta,
        $status,
        $id_Usuario
    );
} else {
    $sql = "UPDATE usuario SET
        nome = ?,
        cpf = ?,
        data_nascimento = ?,
        endereco = ?,
        email = ?,
        tipo_conta = ?,
        status = ?
        WHERE id_Usuario = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "sssssssi",
        $nome,
        $cpf,
        $data_nascimento,
        $endereco,
        $email,
        $tipo_conta,
        $status,
        $id_Usuario
    );
}

if ($stmt->execute()) {
    $stmt->close();
    header("Location: usuario.php");
    exit;
}

echo "Erro ao atualizar usuário: " . htmlspecialchars($stmt->error);

$stmt->close();
?>