<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "situação_aprendizagem";
$porta = 6608;


$conn = new mysqli($host, $usuario, $senha, $banco, $porta);

    if ($conn->connect_error){
        die ("Falha na conexão com o banco de dados: " . $conn->connect_error);
    };

    $conn->set_charset("utf8mb4");

?>