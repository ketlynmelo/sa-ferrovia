<?php
include_once "../../../infra/conexao.php";

$opcoesId = ['options' => ['min_range' => 1]];

$idBusca = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, $opcoesId)
        ?: filter_input(INPUT_GET, 'id_Sensor', FILTER_VALIDATE_INT, $opcoesId);

$dados = null;

if ($idBusca) {

    $sql = "SELECT s.id_Sensor, s.nome_sensor, s.localizacao, s.tipo_dado,
                   t.id_Trem, t.nome_trem, t.modelo, t.carga, t.velocidade,
                   r.id_Rota, r.nome_rota, r.horario_rota, r.ponto_inicial,
                   r.ponto_final, r.distancia
            FROM sensor s
            INNER JOIN trem t ON t.id_Trem = s.Trem_id_Trem
            LEFT JOIN rota r ON r.sensor_id = s.id_Sensor
            WHERE s.id_Sensor = ?
            ORDER BY r.id_Rota
            LIMIT 1";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idBusca);
    $stmt->execute();
    $dados = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}

$temRota = $dados && !empty($dados['id_Rota']);

function sv_icone_tipo($tipo)
{
    $icones = [
        'Velocidade'  => 'bi-speedometer2',
        'Temperatura' => 'bi-thermometer-half',
        'Falha'       => 'bi-exclamation-triangle',
        'Vibração'    => 'bi-activity',
        'Localização' => 'bi-geo-alt',
        'Proximidade' => 'bi-broadcast',
    ];

    return $icones[$tipo] ?? 'bi-cpu';
}

function sv_esc($valor)
{
    return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
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

            <a href="../home_page/usuario_home.php" class="menu-link">
                <i class="bi bi-house-fill"></i>
                <span>Início</span>
            </a>

            <a href="usuario_monitoramento.php" class="menu-link active">
                <i class="bi bi-graph-up"></i>
                <span>Monitoramento</span>
            </a>

            <a href="../../../index.php" class="menu-link">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
            </a>

        </nav>

    </aside>

    <main class="main">

        <div class="rotas-header">
            <div>
                <h1>Detalhes do Sensor</h1>
                <p>Visualize as informações do sensor, do trem e da rota vinculados.</p>
            </div>

            <a href="usuario_monitoramento.php" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>

        <?php if ($dados): ?>

            <!-- Resumo do sensor -->
            <div class="card-dashboard bg-white mb-4">

                <div class="row align-items-center g-4">

                    <div class="col-auto">
                        <div class="icon-card" style="width: 90px; height: 90px; border-radius: 50%;">
                            <i class="bi <?= sv_icone_tipo($dados['tipo_dado']) ?>" style="font-size: 2.8rem;"></i>
                        </div>
                    </div>

                    <div class="col">
                        <h3 class="fw-bold mb-2">
                            <?= sv_esc($dados['nome_sensor']) ?>
                        </h3>

                        <span class="badge badge-admin rounded-pill px-3 py-2">
                            <i class="bi <?= sv_icone_tipo($dados['tipo_dado']) ?>"></i>
                            <?= sv_esc($dados['tipo_dado']) ?>
                        </span>
                    </div>

                    <div class="col-md-3">
                        <div class="border rounded-3 p-3">
                            <div class="mb-2">
                                <?php if ($temRota): ?>
                                    <span class="badge-ativo">
                                        <i class="bi bi-circle-fill" style="font-size: 8px;"></i>
                                        Vinculado
                                    </span>
                                <?php else: ?>
                                    <span class="badge-inativo">
                                        <i class="bi bi-circle-fill" style="font-size: 8px;"></i>
                                        Sem rota
                                    </span>
                                <?php endif; ?>
                            </div>

                            <small class="text-muted">
                                Situação do vínculo
                            </small>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Informações do sensor -->
            <div class="card-dashboard bg-white mb-4">

                <h5 class="fw-bold mb-4">
                    <i class="bi bi-cpu me-2" style="color: #44539c;"></i>
                    Informações do sensor
                </h5>

                <div class="row g-4">

                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 h-100">
                            <small class="text-muted d-block mb-2">
                                <i class="bi bi-hash me-2"></i>ID do sensor
                            </small>
                            <span class="fw-semibold"><?= (int) $dados['id_Sensor'] ?></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 h-100">
                            <small class="text-muted d-block mb-2">
                                <i class="bi bi-cpu me-2"></i>Nome do sensor
                            </small>
                            <span class="fw-semibold"><?= sv_esc($dados['nome_sensor']) ?></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 h-100">
                            <small class="text-muted d-block mb-2">
                                <i class="bi bi-geo-alt me-2"></i>Localização
                            </small>
                            <span class="fw-semibold"><?= sv_esc($dados['localizacao']) ?></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 h-100">
                            <small class="text-muted d-block mb-2">
                                <i class="bi bi-activity me-2"></i>Tipo de dado
                            </small>
                            <span class="fw-semibold"><?= sv_esc($dados['tipo_dado']) ?></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 h-100">
                            <small class="text-muted d-block mb-2">
                                <i class="bi bi-train-freight-front me-2"></i>Trem vinculado
                            </small>
                            <span class="fw-semibold">
                                <?= sv_esc($dados['nome_trem']) ?> (ID <?= (int) $dados['id_Trem'] ?>)
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 h-100">
                            <small class="text-muted d-block mb-2">
                                <i class="bi bi-signpost-split me-2"></i>Rota vinculada
                            </small>
                            <span class="fw-semibold">
                                <?= $temRota
                                    ? sv_esc($dados['nome_rota']) . ' (ID ' . (int) $dados['id_Rota'] . ')'
                                    : 'Nenhuma rota vinculada' ?>
                            </span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Trem vinculado -->
            <div class="card-dashboard bg-white mb-4">

                <h5 class="fw-bold mb-4">
                    <i class="bi bi-train-freight-front me-2" style="color: #44539c;"></i>
                    Trem vinculado
                </h5>

                <div class="row g-4">

                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 h-100">
                            <small class="text-muted d-block mb-2">
                                <i class="bi bi-hash me-2"></i>ID do trem
                            </small>
                            <span class="fw-semibold"><?= (int) $dados['id_Trem'] ?></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 h-100">
                            <small class="text-muted d-block mb-2">
                                <i class="bi bi-train-freight-front me-2"></i>Nome do trem
                            </small>
                            <span class="fw-semibold"><?= sv_esc($dados['nome_trem']) ?></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 h-100">
                            <small class="text-muted d-block mb-2">
                                <i class="bi bi-tag me-2"></i>Modelo
                            </small>
                            <span class="fw-semibold"><?= sv_esc($dados['modelo']) ?></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 h-100">
                            <small class="text-muted d-block mb-2">
                                <i class="bi bi-box-seam me-2"></i>Carga
                            </small>
                            <span class="fw-semibold"><?= sv_esc($dados['carga']) ?></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 h-100">
                            <small class="text-muted d-block mb-2">
                                <i class="bi bi-speedometer2 me-2"></i>Velocidade
                            </small>
                            <span class="fw-semibold"><?= sv_esc($dados['velocidade']) ?></span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Rota vinculada -->
            <div class="card-dashboard bg-white">

                <h5 class="fw-bold mb-4">
                    <i class="bi bi-signpost-split me-2" style="color: #44539c;"></i>
                    Rota vinculada
                </h5>

                <?php if ($temRota): ?>

                    <div class="row g-4">

                        <div class="col-md-6">
                            <div class="border rounded-3 p-3 h-100">
                                <small class="text-muted d-block mb-2">
                                    <i class="bi bi-hash me-2"></i>ID da rota
                                </small>
                                <span class="fw-semibold"><?= (int) $dados['id_Rota'] ?></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="border rounded-3 p-3 h-100">
                                <small class="text-muted d-block mb-2">
                                    <i class="bi bi-signpost-split me-2"></i>Nome da rota
                                </small>
                                <span class="fw-semibold"><?= sv_esc($dados['nome_rota']) ?></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="border rounded-3 p-3 h-100">
                                <small class="text-muted d-block mb-2">
                                    <i class="bi bi-clock me-2"></i>Horário
                                </small>
                                <span class="fw-semibold"><?= sv_esc($dados['horario_rota']) ?></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="border rounded-3 p-3 h-100">
                                <small class="text-muted d-block mb-2">
                                    <i class="bi bi-rulers me-2"></i>Distância
                                </small>
                                <span class="fw-semibold"><?= sv_esc($dados['distancia']) ?></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="border rounded-3 p-3 h-100">
                                <small class="text-muted d-block mb-2">
                                    <i class="bi bi-geo-alt me-2"></i>Ponto inicial
                                </small>
                                <span class="fw-semibold"><?= sv_esc($dados['ponto_inicial']) ?></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="border rounded-3 p-3 h-100">
                                <small class="text-muted d-block mb-2">
                                    <i class="bi bi-flag me-2"></i>Ponto final
                                </small>
                                <span class="fw-semibold"><?= sv_esc($dados['ponto_final']) ?></span>
                            </div>
                        </div>

                    </div>

                <?php else: ?>

                    <div class="border rounded-3 p-4 text-center text-muted">
                        <i class="bi bi-signpost-split" style="font-size: 2rem;"></i>
                        <p class="fw-semibold mb-1 mt-2">Nenhuma rota vinculada</p>
                        <small>Este sensor ainda não foi associado a nenhuma rota.</small>
                    </div>

                <?php endif; ?>

            </div>

            <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">

                <a href="usuario_monitoramento.php" class="btn btn-outline-secondary mb-3">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>

            </div>

        <?php else: ?>

            <!-- Sensor não encontrado / ID inválido -->
            <div class="card-dashboard bg-white text-center">
                <div class="py-4 text-muted">
                    <i class="bi bi-search" style="font-size: 2.5rem;"></i>
                    <h5 class="fw-bold mt-3 mb-2" style="color: #202938;">Sensor não encontrado</h5>
                    <p class="mb-0">
                        <?php if ($idBusca): ?>
                            Não existe nenhum sensor cadastrado com o ID <strong>#<?= (int) $idBusca ?></strong>.
                        <?php else: ?>
                            Informe um ID de sensor válido para pesquisar.
                        <?php endif; ?>
                    </p>
                </div>
            </div>

        <?php endif; ?>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

</body>

</html>