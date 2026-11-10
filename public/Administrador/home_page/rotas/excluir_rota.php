<?php

require_once __DIR__ . '/../../../../infra/conexao.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    header("Location: cadastro_rotas.php?mensagem=erro");
    exit;
}

try {
    $stmt = $conn->prepare("DELETE FROM rota WHERE id_Rota = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $apagou = $stmt->affected_rows > 0;
    $stmt->close();

    header("Location: cadastro_rotas.php?mensagem=" . ($apagou ? 'excluido' : 'erro'));
    exit;

} catch (Throwable $e) {
    header("Location: cadastro_rotas.php?mensagem=erro");
    exit;
}