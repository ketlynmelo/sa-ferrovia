<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . "/conexao.php";

$email = trim($_POST["email"] ?? "");
$senhaDigitada = $_POST["senha"] ?? "";

if ($email === "" || $senhaDigitada === "") {
    header("Location: login.php?erro=1");
    exit;
}

$sql = "SELECT id_Usuario, nome, email, senha,
               tipo_conta, status
        FROM usuario
        WHERE email = ?
        LIMIT 1";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    error_log($conn->error);
    http_response_code(500);
    exit("Erro interno do sistema.");
}

$stmt->bind_param("s", $email);
$stmt->execute();

$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

$stmt->close();

if (
    !$usuario ||
    $usuario["status"] !== "Ativo" ||
    !password_verify($senhaDigitada, $usuario["senha"])
) {
    header("Location: login.php?erro=1");
    exit;
}

session_regenerate_id(true);

$_SESSION["usuario_id"] = $usuario["id_Usuario"];
$_SESSION["usuario_nome"] = $usuario["nome"];
$_SESSION["usuario_email"] = $usuario["email"];
$_SESSION["tipo_conta"] = $usuario["tipo_conta"];

header("Location: painel.php");
exit;