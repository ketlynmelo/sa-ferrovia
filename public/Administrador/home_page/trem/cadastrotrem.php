<?php

    include "../../../../infra/conexao.php";
 

    $nome = $_POST['nome_trem'];
    $modelo = $_POST['modelo'];
    $carga = $_POST['carga'];
    $velocidade = $_POST['velocidade'];
    $sensor = $_POST['sensor'];

$sql = "INSERT INTO trem (nome_trem, modelo, carga, velocidade, sensor) VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt, 
    "sssss",
     $nome, 
     $modelo, 
     $carga, 
     $velocidade,
     $sensor   
     );

mysqli_stmt_execute($stmt);

header("Location: ../index.php");

exit();

?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XRail</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <aside class="sidebar">

        <div class="text-center mb-5">
            <img src="../../../assets/images/Simbolo.png" class="logo">
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

            <div class="tab-pane fade" id="cadastrarTrem">
                <div class="form-card">
                    <div class="page-title">Cadastrar Trens</div>

                     <form action="cadastrotrem.php" method="POST" class="row g-3 needs-validation">

                        
<div class="col-12">
    <label for="ct_nome" class="form-label">Nome do Trem</label>
    <input type="text" class="form-control"
           id="ct_nome" name="nome_trem"
           placeholder="ex: Stiles" required>
</div>

<div class="col-12">
    <label for="ct_modelo" class="form-label">Modelo</label>
    <input type="text" class="form-control"
           id="ct_modelo" name="modelo"
           placeholder="ex: 2023" required>
</div>

<div class="col-12">
    <label for="ct_carga" class="form-label">Carga</label>
    <select class="form-select" id="ct_carga"
            name="carga" required>
        <option value="" selected disabled>
            Selecione o tipo de carga
        </option>
        <option value="Passageiros">Passageiros</option>
        <option value="Carga Geral">Carga Geral</option>
        <option value="Minério">Minério</option>
        <option value="Combustível">Combustível</option>
    </select>
</div>

<div class="col-12">
    <label for="ct_velocidade" class="form-label">Velocidade</label>
    <input type="number" class="form-control"
           id="ct_velocidade" name="velocidade"
           required>
</div>

<div class="col-12">
    <label for="ct_sensor" class="form-label">Sensor</label>
    <select class="form-select" id="ct_sensor"
            name="sensor" required>
        <option value="" selected disabled>
            Selecione um sensor
        </option>
        <!-- Adicione aqui as opções dos sensores -->
    </select>
</div>

<div class="col-12 d-flex gap-2 mt-3">
    <button type="button" class="btn btn-cancelar"
            onclick="history.back()">Cancelar</button>
    <button type="submit" class="btn btn-salvar">Salvar</button>
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