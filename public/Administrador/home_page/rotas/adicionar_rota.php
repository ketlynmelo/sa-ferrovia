<?php
    include "../../../../infra/conexao.php";
    
    ?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>XRail - Rotas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link rel="stylesheet" href="../../../../style/style.css">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <aside class="sidebar">

        <div class="text-center mb-5">
            <img src="../../../../assets/images/Simbolo.png" class="logo" alt="XRail">
        </div>

        <nav class="d-flex flex-column">

            <a href="../../home_page/adm_home.php" class="menu-link">
                <i class="bi bi-house-fill"></i>
                <span>Início</span>
            </a>

            <a href="cadastro_rotas.php" class="menu-link active">
                <i class="bi bi-train-freight-front"></i>
                <span>Rotas</span>
            </a>

            <a href="../../monitoramento_page/adm_monitoramento.php" class="menu-link">
                <i class="bi bi-graph-up"></i>
                <span>Monitoramento</span>
            </a>

            <a href="../../relatorios_page/relatorios.php" class="menu-link">
                <i class="bi bi-file-earmark-text"></i>
                <span>Relatórios</span>
            </a>

            <a href="../../usuario_page/usuario.php" class="menu-link">
                <i class="bi bi-people"></i>
                <span>Usuários</span>
            </a>

            <a href="../../../../logout.php" class="menu-link">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
            </a>

        </nav>

    </aside>

     <main class="main">

        <div class="container-fluid">

            <a href="cadastro_rotas.php" class="btn btn-outline-secondary mb-3">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>

            <div class="form-card" id="cadastrarTrem">

                <h1 class="form-title">Cadastro de Rotas</h1>

                <form action="rotas.php" method="POST" class="row g-3">

                <div class="col-12">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" name="nome_rota" id="nome" class="form-control" required>
                </div>
                
                <div class="col-12">
                    <label for="horario" class="form-label">Horário:</label>
                    <input type="time" name="horario_rota" id="horario" class="form-control" required>
                </div>

                <div class="col-12">
                    <label for="ponto_inicial" class="form-label">Ponto Inicial:</label>
                    <input type="text" name="ponto_inicial" id="ponto_inicial" class="form-control" required>
                </div>

                <div class="col-12">
                    <label for="ponto_final" class="form-label">Ponto Final:</label>
                    <input type="text" name="ponto_final" id="ponto_final" class="form-control" required>
                </div>

                <div class="col-12">
                    <label for="distancia" class="form-label">Distância:</label>
                    <input type="number" name="distancia" id="distancia" class="form-control" required>
                </div>
                
                <div class="col-12">
                    <label for="sensor_id" class="form-label">Sensor:</label>

                    <select name="sensor_id" id="sensor_id" class="form-control" required>
                        <option value="">Selecione o sensor</option>

                        <?php
                            $sql = "SELECT id_Sensor, nome_sensor FROM sensor";
                            $result = $conn->query($sql);

                            while ($sensor = mysqli_fetch_assoc($result)) {
                        ?>
                                <option value="<?php echo $sensor['id_Sensor']; ?>">
                                    <?php echo $sensor['nome_sensor']; ?>
                                </option>
                        <?php
                            }
                        ?>
                    
                    </select>

                </div>

                <button type="submit" class="btn btn-primary">Cadastrar</button>

                </form> 
        </div>

    </main>

</body>