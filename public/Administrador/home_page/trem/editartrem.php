<?php

include "../infra/conexao.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id           = $_POST["id"];
    $nome = $_POST['nome_trem'];
    $carga = $_POST['carga'];
    $velocidade = $_POST['velocidade'];
    $sensor = $_POST['sensor'];

    $stmt = mysqli_prepare(
        $conexao,
        "UPDATE trem
         SET nome = ?, modelo = ?, carga = ?, velocidade = ?, fk_sensor = ?
         WHERE id = ?"
    );

    mysqli_stmt_bind_param($stmt, "sssssi", $nome, $modelo, $carga, $velocidade, $sensor, $id);
    mysqli_stmt_execute($stmt);

    header("Location: ../index.php");
    exit();
}


$id = $_GET["id"];

$stmt = mysqli_prepare($conexao, "SELECT * FROM trem WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);
$brinquedo = mysqli_fetch_assoc($resultado);

if (!$brinquedo) {
    die("Trem não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Trem</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <header>
        <h1>Trens</h1>
    </header>
    <main>
        <div>
            <h2>Editando o trem!</h2>
            <form action="trens-editar.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $trem["id"] ?>">

                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="<?php echo htmlspecialchars($trem["nome"]) ?>">
                <br>
                
                <label for="modelo">Modelo:</label>
                <input type="text" name="modelo" value="<?php echo htmlspecialchars($trem["modelo"]) ?>">
                <br>

                <label for="carga">Carga:</label>
                <input type="select" name="carga" value="<?php echo htmlspecialchars($trem["carga"]) ?>">
                    <select class="form-select" id="ct_carga">
                                <option value="" selected disabled>Selecione o tipo de carga</option>
                                <option>Passageiros</option>
                                <option>Carga Geral</option>
                                <option>Minério</option>
                                <option>Combustível</option>
                    </select>
                <br>
                <label for="velocidade">Velocidade:</label>
                <input type="number" step="0.01" name="velocidade" value="<?php echo $trem ["velocidade"] ?>">
                <br>
              
                <label for="sensor">Sensor:</label>
                <input type="form-select" name="sensor" value="<?php echo htmlspecialchars($trem["sensor"]) ?>">
                <br>

                <button type="submit">Atualizar</button>
            </form>
        </div>
    </main>
</body>
</html>