<?php

require_once __DIR__ . '/../../../../infra/conexao.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$rotasLivres = $conn->query(
    "SELECT id_Rota, nome_rota, ponto_inicial, ponto_final
     FROM rota
     WHERE sensor_id IS NULL
     ORDER BY nome_rota"
)->fetch_all(MYSQLI_ASSOC);

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
        $stmt = $conn->prepare(
            "INSERT INTO sensor (nome_sensor, localizacao, tipo_dado, Trem_id_Trem)
             VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param("sssi", $nome, $localizacao, $tipo, $trem);
        $stmt->execute();
        $idSensor = $conn->insert_id;
        $stmt->close();

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
?>
<!DOCTYPE html>
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
    
            <a href="../../../../logout.php" class="menu-link">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
            </a>

        </nav>

    </aside>

     <main class="main">

        <div class="container-fluid">

        <a href="../adm_home.php" class="btn btn-outline-secondary mb-3">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
        <br>
        <br>

            <h2 class="page-title">Cadastrar sensores</h2>

            <div class="editar-rota-card">

                <div class="editar-rota-header">
                    <div class="editar-rota-icone">
                        <i class="bi bi-cpu"></i>
                    </div>
                    <h8>Novo sensor</h8>
                </div>

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

    <?php if (count($rotasLivres) > 0): ?>

        <select class="form-select" id="ct_rota" name="Rota_id_Rota" required>
            <option value="" selected disabled>Selecione uma rota</option>

            <?php foreach ($rotasLivres as $r): ?>
                <option value="<?= (int) $r['id_Rota'] ?>">
                    <?= htmlspecialchars($r['nome_rota']) ?>
                    (<?= htmlspecialchars($r['ponto_inicial']) ?> → <?= htmlspecialchars($r['ponto_final']) ?>)
                </option>
            <?php endforeach; ?>
        </select>

    <?php else: ?>

        <div class="alert alert-warning mb-0">
            Não há rotas livres. Cadastre uma rota antes de criar o sensor.
        </div>

    <?php endif; ?>
</div>

                        <div class="col-12 d-flex gap-2 mt-3">
                            <a href="../adm_home.php" class="btn btn-cancelar">
                                Cancelar
                            </a>

                                  <button type="submit" class="btn btn-salvar">
                                Salvar Sensor
                            </button>
                        </div>

                    </form>

            </div>

        </div>

    </main>

</body>

</html>