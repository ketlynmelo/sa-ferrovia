<?php
session_start();

include "../../../infra/conexao.php";
include "../../../infra/verificar_adm.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if (!$id) {
    header("Location: usuario.php");
    exit;
}

$sql = "SELECT * FROM usuario WHERE id_Usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

$stmt->close();

if (!$usuario) {
    header("Location: usuario.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar usuário</title>
     <link rel="stylesheet" href="../../../style/style.css">
</head>

<body>
    
<h1>Credenciais do usuário</h1>

 <div class="funcionario">
        <h2><?php echo htmlspecialchars($usuario["nome"]); ?></h2>

        <p><strong>ID:</strong> <?php echo $usuario["id_Usuario"]; ?></p>

        <p><strong>Nome:</strong> <?php echo htmlspecialchars($usuario["nome"]); ?></p>

        <p><strong>E-mail:</strong> <?php echo htmlspecialchars($usuario["email"]); ?></p>

        <p><strong>CPF:</strong> <?php echo htmlspecialchars($usuario["cpf"]); ?></p>

        <p><strong>Data de nascimento:</strong> <?php echo $usuario["data_nascimento"]; ?></p>

        <p><strong>Endereço:</strong> <?php echo htmlspecialchars($usuario["endereco"]); ?></p>

        <p><strong>Tipo de conta:</strong> <?php echo htmlspecialchars($usuario["tipo_conta"]); ?></p>

        <p><strong>Status:</strong> <?php echo htmlspecialchars($usuario["status"]); ?></p>

        <button type="button" onclick="window.location.href='usuario.php'">Voltar</button>

        <button type="button" onclick="window.location.href='editar_usuario.php?id=1'">
    Editar funcionário </button>

    </div>


</body>

</html>