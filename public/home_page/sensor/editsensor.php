<?php

include '../../infra/conexao.php';

$id = $_GET['id'];
$sql = "SELECT * FROM sensor WHERE id = $id";
$sensor_editantes = $conn->query($sql);
$sensor = $sensor_editantes->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST["nome_sensor"];
    $localizacao = $_POST["localização"];
    $tipo = $_POST["tipo_dado"];
    $trem = $_POST["Trem_id_Trem"];

    $sql = "UPDATE sensor SET nome='$nome', localização='$localizacao', tipo_dado='$tipo', Trem_id_Trem='$trem' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Sensor atualizado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XRail</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <aside class="sidebar">

        <div class="text-center mb-5">
            <img src="../../assets/images/Simbolo.png" class="logo">
        </div>

        <nav class="d-flex flex-column">

            <a href="../home_page/home.php" class="menu-link active">
                <i class="bi bi-house-fill"></i>
                <span>Início</span>
            </a>

            <a href="../monitoramento_page/monitoramento.php" class="menu-link">
                <i class="bi bi-graph-up"></i>
                <span>Monitoramento</span>
            </a>

            <a href="../relatorios_page/relatorios.php" class="menu-link">
                <i class="bi bi-file-earmark-text"></i>
                <span>Relatórios</span>
            </a>

            <a href="../usuario_page/usuario.php" class="menu-link">
                <i class="bi bi-people"></i>
                <span>Usuários</span>
            </a>

            <a href="../../index.php" class="menu-link">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
            </a>

        </nav>

    </aside>

    <main class="main">

        <div class="container-fluid">

            <div class="tab-pane fade" id="editarSensor">
                <div class="form-card">
                    <div class="page-title">Editar Sensor</div>

                    <form class="row g-3 needs-validation" novalidate>

                        <div class="col-12">
                            <label for="es_nome" class="form-label">Nome do sensor</label>
                            <input type="text" class="form-control" id="es_nome" value="Lazum" />
                        </div>

                        <div class="col-12">
                            <label for="es_tipo" class="form-label">Tipos de Dados Monitorado</label>
                            <input type="text" class="form-control" id="es_tipo" value="Velocidade" readonly />
                        </div>

                        <div class="col-12">
                            <label for="es_id" class="form-label">ID</label>
                            <input type="text" class="form-control" id="es_id" value="150" readonly />
                        </div>

                        <div class="col-12">
                            <div class="form-check mb-1">
                                <input class="form-check-input" type="text" name="es_assoc" id="es_loc_radio"
                                    value="localizacao" />
                                <label class="form-check-label" for="es_loc_radio">Localização</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-check mb-1">
                                <input class="form-check-input" type="radio" name="es_assoc" id="es_trem_radio"
                                    value="trem" checked />
                                <label class="form-check-label" for="es_trem_radio">Trem vinculado</label>
                            </div>
                            <select class="form-select" id="es_trem">
                            </select>
                        </div>

                        <div class="col-12 d-flex gap-2 mt-3">
                            <button type="button" class="btn btn-cancelar">Cancelar</button>
                            <button type="submit" class="btn btn-salvar">Salvar</button>
                        </div>

                    </form>

                </div>
            </div>


        </div>

    </main>

</body>

</html>