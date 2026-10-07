<?php

include ('/../../infra/conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST["nome_sensor"];
    $localizacao = $_POST["localização"];
    $tipo = $_POST["tipo_dado"];
    $trem = $_POST["Trem_id_Trem"];

    $sql = "INSERT INTO sensor (nome_sensor, localização, tipo_dado, Trem_id_Trem) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nome, $localizacao, $tipo, $trem);

    if ($stmt->execute() === TRUE) {
        echo "Novo sensor cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

?>
