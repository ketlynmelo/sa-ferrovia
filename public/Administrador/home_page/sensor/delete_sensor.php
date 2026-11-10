<?php

require_once __DIR__ . '/../../../../infra/conexao.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if (!isset($_GET['id_Sensor']) || !is_numeric($_GET['id_Sensor'])) {
    header("Location: ../adm_home.php?mensagem=erro");
    exit;
}

$id = (int) $_GET['id_Sensor'];

$conn->begin_transaction();

try {
    /* Libera a rota que usava este sensor (senão a chave estrangeira bloqueia a exclusão) */
    $stmt = $conn->prepare("UPDATE rota SET sensor_id = NULL WHERE sensor_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    $stmt = $conn->prepare("DELETE FROM sensor WHERE id_Sensor = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $apagou = $stmt->affected_rows > 0;
    $stmt->close();

    if (!$apagou) {
        throw new Exception("Sensor não encontrado.");
    }

    $conn->commit();

    header("Location: ../adm_home.php?mensagem=excluido");
    exit;

} catch (Throwable $e) {
    $conn->rollback();

    header("Location: ../adm_home.php?mensagem=erro");
    exit;
}