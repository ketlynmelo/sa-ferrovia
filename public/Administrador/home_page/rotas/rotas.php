<?php
    include "../../../../infra/conexao.php";
    include "../../../../infra/verificar_adm.php";

    $nome_rota = $_POST['nome_rota'];
    $horario_rota = $_POST['horario_rota'];
    $ponto_inicial = $_POST['ponto_inicial'];
    $ponto_final = $_POST['ponto_final'];
    $distancia = $_POST['distancia'];

    $sql = "INSERT INTO rota (nome_rota, horario_rota, ponto_inicial, ponto_final, distancia) VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param
    (
    $stmt, 
    "ssssi", 
    $nome_rota, 
    $horario_rota, 
    $ponto_inicial, 
    $ponto_final, 
    $distancia
    );

    mysqli_stmt_execute($stmt);
    header("Location: cadastro_rotas.php");
?>


