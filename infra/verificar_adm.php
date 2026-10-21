<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['id_Usuario'])) {
    header("Location: sa-ferrovia/index.php");
    exit;
}


require_once __DIR__ . "/verificar_login.php";

if (
    !isset($_SESSION['tipo_conta']) ||
    $_SESSION['tipo_conta'] !== 'Administrador'
) {
    http_response_code(403);
    exit("Acesso negado. Somente administradores podem acessar esta página.");
}

?>