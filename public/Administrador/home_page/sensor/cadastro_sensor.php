<?php

require_once __DIR__ . '/../../../../infra/conexao.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome        = trim($_POST["nome_sensor"] ?? '');
    $localizacao = trim($_POST["localizacao"] ?? '');
    $tipo        = $_POST["tipo_dado"] ?? '';
    $trem        = filter_input(INPUT_POST, "Trem_id_Trem", FILTER_VALIDATE_INT);
    $rota        = filter_input(INPUT_POST, "Rota_id_Rota", FILTER_VALIDATE_INT);

    if ($nome === '' || $localizacao === '' || $tipo === '' || !$trem || !$rota) {
        header("Location: ../adm_home.php?mensagem=erro");
        exit;
    }

    $conn->begin_transaction();

    try {
        /* 1. Cadastra o sensor */
        $stmt = $conn->prepare(
            "INSERT INTO sensor (nome_sensor, localizacao, tipo_dado, Trem_id_Trem)
             VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param("sssi", $nome, $localizacao, $tipo, $trem);
        $stmt->execute();
        $idSensor = $conn->insert_id;
        $stmt->close();

        /* 2. Liga a rota escolhida ao novo sensor (só se a rota ainda estiver livre) */
        $stmt = $conn->prepare(
            "UPDATE rota SET sensor_id = ? WHERE id_Rota = ? AND sensor_id IS NULL"
        );
        $stmt->bind_param("ii", $idSensor, $rota);
        $stmt->execute();

        if ($stmt->affected_rows !== 1) {
            throw new Exception("Rota indisponível.");
        }

        $stmt->close();
        $conn->commit();

        header("Location: ../adm_home.php?mensagem=cadastrado");
        exit;

    } catch (Throwable $e) {
        $conn->rollback();

        header("Location: ../adm_home.php?mensagem=erro");
        exit;
    }
}

/* Rotas que ainda não têm sensor (cada rota recebe um único sensor) */
$rotasLivres = $conn->query(
    "SELECT id_Rota, nome_rota, ponto_inicial, ponto_final
     FROM rota
     WHERE sensor_id IS NULL
     ORDER BY nome_rota"
);
$temRotaLivre = $rotasLivres->num_rows > 0;

?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XRail</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../../../../style/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

    <aside class="sidebar">

        <div class="text-center mb-5">
            <img src="../../../../assets/images/Simbolo.png" class="logo">
        </div>

        <nav class="d-flex flex-column">

            <a href="../adm_home.php" class="menu-link active">
                <i class="bi bi-house-fill"></i>
                <span>Início</span>
            </a>


            <a href="../../home_page/rotas/cadastro_rotas.php" class="menu-link active">
                <i class="bi bi-train-freight-front"></i>
                <span>Rotas</span>
            </a>

            <a href="../../home_page/adm_home.php" class="menu-link ">
                <i class="bi bi-people"></i>
                <span>Usuários</span>
            </a>


            <a href="../../relatorios_page/relatorios.php" class="menu-link">
                <i class="bi bi-file-earmark-text"></i>
                <span>Relatórios</span>
            </a>

            <a href="../../../logout.php" class="menu-link">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
            </a>

        </nav>

    </aside>

     <main class="main">

        <div class="container-fluid">

        

            <div class="form-card" id="cadastrarTrem">



                    <div class="page-title">Cadastrar Sensores</div>

                    <form action="cadastro_sensor.php" method="POST" class="row g-3">
                        
                        <div class="col-12">
                            <label for="ct_nome" class="form-label">Nome do sensor</label>
                            <input type="text" class="form-control"
                                id="ct_nome" name="nome_sensor"
                                placeholder="ex: Stiles" required>
                        </div>

                       <div class="col-12">
                    <label for="localizacao" class="form-label">Localização</label>
                            <input type="text" class="form-control" id="ct_localizacao" name="localizacao"
                                placeholder="ex: Estação Central" required>
                        </div>

                        <div class="col-12">
                            <label for="ct_carga" class="form-label">Tipo de Dado</label>
                            <select class="form-select" id="tipo_dado" name="tipo_dado" required>

                                <option value="" selected disabled>
                                    Selecione o tipo de dado
                                </option>
                                <option value="Temperatura">Temperatura</option>
                                <option value="Proximidade">Proximidade</option>
                                <option value="Velocidade">Velocidade</option>
                                <option value="Localização">Localização</option>
                                <option value="Vibração">Vibração</option>
                            </select>
                        </div>

                        <div class="col-12">
                            
                            <label for="ct_carga" class="form-label">Trem</label>
                            <select class="form-select" id="ct_trem" name="Trem_id_Trem" required>

                                <option value="" selected disabled>
                                    Selecione um trem
                                </option>

                                <?php
                                    $sqlTrem = "SELECT id_Trem, nome_trem FROM trem";
                                    $resultadoTrem = mysqli_query($conn, $sqlTrem);

                                    while ($trem = mysqli_fetch_assoc($resultadoTrem)) {
                                        echo '<option value="' . $trem['id_Trem'] . '">' . htmlspecialchars($trem['nome_trem']) . '</option>';
                                    }
                                ?>

                            </select>

                        </div>

                                                <div class="col-12">
                            <label for="ct_rota" class="form-label">Rota</label>

                            <?php if ($temRotaLivre): ?>

                                <select class="form-select" id="ct_rota" name="Rota_id_Rota" required>

                                    <option value="" selected disabled>
                                        Selecione uma rota
                                    </option>

                                    <?php while ($rotaLivre = $rotasLivres->fetch_assoc()): ?>
                                        <option value="<?= (int) $rotaLivre['id_Rota'] ?>">
                                            <?= htmlspecialchars($rotaLivre['nome_rota']) ?>
                                            (<?= htmlspecialchars($rotaLivre['ponto_inicial']) ?>
                                            → <?= htmlspecialchars($rotaLivre['ponto_final']) ?>)
                                        </option>
                                    <?php endwhile; ?>

                                </select>

                            <?php else: ?>

                                <div class="alert alert-warning mb-0">
                                    Não há rotas disponíveis.
                                    <a href="../rotas/adicionar_rota.php">Cadastre uma rota</a>
                                    antes de cadastrar o sensor.
                                </div>

                            <?php endif; ?>
                        </div>

                        <div class="col-12 d-flex gap-2 mt-3">
                            <a href="../adm_home.php" class="btn btn-cancelar">
                                Cancelar
                            </a>

                                                        <button type="submit" class="btn btn-salvar" <?= $temRotaLivre ? '' : 'disabled' ?>>
                                Salvar Sensor
                            </button>
                        </div>

                    </form>

            </div>

        </div>

    </main>

</body>

</html>