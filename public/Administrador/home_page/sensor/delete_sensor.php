<?php

require_once __DIR__ . '/../../../../infra/conexao.php';

if (!isset($_GET['id_Sensor']) || !is_numeric($_GET['id_Sensor'])) {
    header("Location: ../adm_home.php");
    exit;
}

$id = (int) $_GET['id_Sensor'];

$sql = "DELETE FROM sensor WHERE id_Sensor = ?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    header("Location: ../adm_home.php");
    exit;
}

mysqli_stmt_close($stmt);

die("Erro ao excluir o sensor. Verifique se existem dados vinculados a ele.");
?>
