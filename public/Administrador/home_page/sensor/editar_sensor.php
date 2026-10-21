<?php

require_once __DIR__ . '/../../../../infra/conexao.php';
include "../../infra/verificar_adm.php";


$id = filter_input(INPUT_GET, 'id_Sensor', FILTER_VALIDATE_INT);

if (!$id) {
    header("Location: ../adm_home.php");
    exit;
}

$sql = "SELECT * FROM sensor WHERE id_Sensor = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$sensor = $resultado->fetch_assoc();

if (!$sensor) {
    die("Sensor não encontrado.");
}

$trens = $conn->query(
    "SELECT id_Trem, nome_trem FROM trem ORDER BY nome_trem"
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome_sensor'] ?? '');
    $localizacao = trim($_POST['localizacao'] ?? '');
    $tipo = trim($_POST['tipo_dado'] ?? '');
    $trem = filter_input(INPUT_POST, 'Trem_id_Trem', FILTER_VALIDATE_INT);

    if ($nome === '' || $localizacao === '' || $tipo === '' || !$trem) {
        die("Preencha todos os campos corretamente.");
    }

    $sql = "UPDATE sensor
            SET nome_sensor = ?, localizacao = ?,
                tipo_dado = ?, Trem_id_Trem = ?
            WHERE id_Sensor = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssii", $nome, $localizacao, $tipo, $trem, $id);

    if ($stmt->execute()) {
        header("Location: ../adm_home.php");
        exit;
    } else {
        echo "Erro ao atualizar sensor: " . $conn->error;
    }
}
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
            
            <a href="../rotas/cadastro_rotas.php" class="menu-link">
                <i class="bi bi-train-freight-front"></i>
                <span>Rotas</span>
            </a>


            <a href="../monitoramento_page/adm_monitoramento.php" class="menu-link">
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

            <a href="../../../logout.php" class="menu-link">
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

            <div class="form-card" id="cadastrarTrem">

                    <div class="page-title">Editar Sensor</div>

                
                        <form class="row g-3 needs-validation"
                            action="editar_sensor.php?id_Sensor=<?= $id ?>"
                            method="POST">

                            <div class="col-12">
                                <label for="es_nome" class="form-label">Nome do sensor</label>
                                <input type="text" class="form-control"
                                    id="es_nome" name="nome_sensor"
                                    value="<?= htmlspecialchars($sensor['nome_sensor']) ?>"
                                    required>
                            </div>

                            <div class="col-12">
                                <label for="es_tipo" class="form-label">
                                    Tipo de dado monitorado
                                </label>
                               <select class="form-select" id="tipo_dado" name="tipo_dado" required>

                                    <option value="<?= $sensor['tipo_dado'] ?>" selected>
                                        <?= htmlspecialchars($sensor['tipo_dado']) ?>
                                    </option>
                                    <option value="Temperatura">Temperatura</option>
                                    <option value="Proximidade">Proximidade</option>
                                    <option value="Velocidade">Velocidade</option>
                                    <option value="Localização">Localização</option>
                                    <option value="Vibração">Vibração</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="es_id" class="form-label">ID</label>
                                <input type="text" class="form-control"
                                    id="es_id"
                                    value="<?= $sensor['id_Sensor'] ?>" readonly>
                            </div>

                            <div class="col-12">
                                <label for="es_localizacao" class="form-label">
                                    Localização
                                </label>
                                <input type="text" class="form-control"
                                    id="es_localizacao" name="localizacao"
                                    value="<?= htmlspecialchars($sensor['localizacao']) ?>"
                                    required>
                            </div>

                            <div class="col-12">
                                <label for="es_trem" class="form-label">Trem vinculado</label>
                                <select class="form-select" id="es_trem"
                                        name="Trem_id_Trem" required>

                                    <?php while ($trem = $trens->fetch_assoc()) { ?>
                                        <option value="<?= $trem['id_Trem'] ?>"
                                            <?= $trem['id_Trem'] == $sensor['Trem_id_Trem']
                                                ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($trem['nome_trem']) ?>
                                        </option>
                                    <?php } ?>

                                </select>
                            </div>

                            <div class="col-12 d-flex gap-2 mt-3">
                                <a href="../adm_home.php" class="btn btn-cancelar">
                                    Cancelar
                                </a>

                                <button type="submit" class="btn btn-salvar">
                                    Salvar alterações
                                </button>
                            </div>

                        </form>


                </div>
            </div>


        </div>

    </main>

</body>

</html>