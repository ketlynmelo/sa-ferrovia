
<?php
include "../../../../infra/conexao.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: cadastro_rotas.php");
    exit;
}

$id = (int) $_GET['id'];

$sql = "SELECT * FROM rota WHERE id_Rota = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$rota = $resultado->fetch_assoc();

$stmt->close();

if (!$rota) {
    header("Location: cadastro_rotas.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>XRail - Editar Rota</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../../style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="pagina-editar-rota">

    <aside class="sidebar">
        <div class="text-center mb-5">
            <img src="../../../../assets/images/Simbolo.png" class="logo" alt="XRail">
        </div>

        <nav class="d-flex flex-column">
            <a href="../adm_home.php" class="menu-link">
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

            <h2 class="page-title">Editar Rota</h2>

            <p class="subtitulo-editar-rota">
                Atualize as informações da rota ferroviária.
            </p>

            <div class="editar-rota-card">

                <div class="editar-rota-header">
                    <div class="editar-rota-icone">
                        <i class="bi bi-train-freight-front"></i>
                    </div>

                    <div>
                        <h3>Informações da rota</h3>
                        <p>
                            Editando: <?= htmlspecialchars($rota['nome_rota'], ENT_QUOTES, 'UTF-8') ?>
                        </p>
                    </div>
                </div>

                <form action="atualizar_rotas.php" method="POST">

                    <input type="hidden" name="id_Rota" value="<?= (int) $rota['id_Rota'] ?>">

                    <div class="editar-rota-grid">

                        <div class="campo-editar-rota">
                            <label for="nome_rota">Nome da rota</label>
                            <input
                                type="text"
                                name="nome_rota"
                                id="nome_rota"
                                class="form-control"
                                value="<?= htmlspecialchars($rota['nome_rota'], ENT_QUOTES, 'UTF-8') ?>"
                                required
                            >
                        </div>

                        <div class="campo-editar-rota">
                            <label for="horario_rota">Horário</label>
                            <input
                                type="time"
                                name="horario_rota"
                                id="horario_rota"
                                class="form-control"
                                value="<?= htmlspecialchars(substr($rota['horario_rota'], 0, 5), ENT_QUOTES, 'UTF-8') ?>"
                                required
                            >
                        </div>

                        <div class="campo-editar-rota">
                            <label for="ponto_inicial">Ponto inicial</label>
                            <input
                                type="text"
                                name="ponto_inicial"
                                id="ponto_inicial"
                                class="form-control"
                                value="<?= htmlspecialchars($rota['ponto_inicial'], ENT_QUOTES, 'UTF-8') ?>"
                                required
                            >
                        </div>

                        <div class="campo-editar-rota">
                            <label for="ponto_final">Ponto final</label>
                            <input
                                type="text"
                                name="ponto_final"
                                id="ponto_final"
                                class="form-control"
                                value="<?= htmlspecialchars($rota['ponto_final'], ENT_QUOTES, 'UTF-8') ?>"
                                required
                            >
                        </div>

                        <div class="campo-editar-rota">
                            <label for="distancia">Distância (km)</label>
                            <input
                                type="number"
                                name="distancia"
                                id="distancia"
                                class="form-control"
                                min="0"
                                step="any"
                                value="<?= htmlspecialchars((string) $rota['distancia'], ENT_QUOTES, 'UTF-8') ?>"
                                required
                            >
                        </div>

                    </div>

                    <div class="editar-rota-acoes">
                        <a href="cadastro_rotas.php" class="botao-rota-voltar">
                            <i class="bi bi-arrow-left"></i>
                            Voltar
                        </a>

                        <button type="submit" class="botao-rota-salvar">
                            <i class="bi bi-check-lg"></i>
                            Salvar alterações
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </main>

</body>
</html>
