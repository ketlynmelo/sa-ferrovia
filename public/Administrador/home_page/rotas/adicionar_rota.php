<?php
    include "../../../../infra/conexao.php";
    ?>


<h1>Cadastro de Rotas</h1>
<link rel="stylesheet" href="../../../../style/style.css">


<form action="rotas.php" method="POST" >


    <label for="nome">Nome:</label>
    <input type="text" name="nome_rota" id="nome" required>

    <br><br>

    <label for="horario">Horário:</label>
    <input type="time" name="horario_rota" id="horario" required>

    <br><br>

    <label for="ponto_inicial">Ponto Inicial:</label>
    <input type="text" name="ponto_inicial" id="ponto_inicial" required>

    <br><br>

    <label for="ponto_final">Ponto Final:</label>
    <input type="text" name="ponto_final" id="ponto_final" required>

    <br><br>

    <label for="distancia">Distância:</label>
    <input type="number" name="distancia" id="distancia" required>

    <br><br>


    <!-- <label for="sensor">Sensor:</label>
    <select name="sensor_id" id="sensor_id" required>
        <option value="">Selecione o sensor</option>

        <!-- <?php

        // $sql = "SELECT id_Sensor, nome FROM sensor";
        // $result = $conn->query($sql);

        // while ($sensor = mysqli_fetch_assoc($result)) {
        // ?>

        //     <option value="<?php// echo $sensor["id_Sensor"]; ?>">
        //         <?php// echo $sensor["nome"]; ?>
        //     </option>

        // <?php
        // }
        ?> -->

    <!-- </select>  -->


    <button type="submit">Cadastrar</button>

</form>

