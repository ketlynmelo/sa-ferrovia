<?php

$id = $_GET['id'];
include("../../infra/conexao.php");

$sql = "DELETE FROM sensor WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Sensor excluído com sucesso!<br>";
    echo "<button type='button' onclick=\"window.location.href='../../index.php'\">Voltar</button>";
} else {
    echo "Erro ao excluir sensor: " . $conn->error;
}

?>
