<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['id_Usuario'])) {
    header("Location: index.php");
    exit;
}

if (!isset($_SESSION['tipo_conta']) || $_SESSION['tipo_conta'] !== 'Administrador') {
    header("Location: index.php");
    exit;
}