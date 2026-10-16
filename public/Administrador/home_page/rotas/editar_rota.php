<?php

include "../../../../infra/conexao.php";

$id = $_GET["id"];

$sql = "SELECT * FROM rota WHERE id_Rota = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);

mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

$rota = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Rota</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>

<main>

    <h2>Editando a Rota <?php echo $rota["id_Rota"]; ?>!</h2>
    <form action="atualizar_rotas.php" method="POST">

        <input type="hidden" name="id_Rota" value="<?php echo $rota["id_Rota"]; ?>">

        <label for="nome_rota">Nome:</label>
        <input type="text" name="nome_rota" value="<?php echo $rota["nome_rota"]; ?>" required>

        <br>

        <label for="horario_rota">Horário:</label>
        <input type="time" name="horario_rota" value="<?php echo $rota["horario_rota"]; ?>" required>

        <br>

        <label for="ponto_inicial">Ponto Inicial:</label>
        <input type="text" name="ponto_inicial" value="<?php echo $rota["ponto_inicial"]; ?>" required>

        <br>

        <label for="ponto_final">Ponto Final:</label>
        <input type="text" name="ponto_final" value="<?php echo $rota["ponto_final"]; ?>" required>

        <br>

        <label for="distancia">Distância:</label>
        <input type="text" name="distancia" value="<?php echo $rota["distancia"]; ?>" required>
        <br>  

        <button type="submit">Atualizar</button>

    </form>

</main>

</body>

</html>

