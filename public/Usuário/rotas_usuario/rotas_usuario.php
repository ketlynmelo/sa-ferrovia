<?php
session_start();
require_once "../../../infra/conexao.php";

$sql = "SELECT  rota.*, trem.nome_trem FROM rota LEFT JOIN trem ON rota.trem_id = trem.id_Trem ORDER BY id_Rota DESC";
$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>XRail - Rotas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link rel="stylesheet" href="../../../style/style.css">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <aside class="sidebar">

        <div class="text-center mb-5">
            <img src="../../../assets/images/Simbolo.png" class="logo" alt="XRail">
        </div>

        <nav class="d-flex flex-column">

            <a href="../home_page/usuario_home.php" class="menu-link">
                <i class="bi bi-house-fill"></i>
                <span>Início</span>
            </a>

            <a href="rotas_usuario.php" class="menu-link active">
                <i class="bi bi-train-freight-front"></i>
                <span>Rotas</span>
            </a>

            <a href="../monitoramento_page/usuario_monitoramento.php" class="menu-link">
                <i class="bi bi-graph-up"></i>
                <span>Monitoramento</span>
            </a>

            <a href="../../../logout.php" class="menu-link">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
            </a>

        </nav>

    </aside>

    <main class="main">

        <div class="container-fluid">

        <div class="rotas-header">
            <div>
                <h1>Gerenciamento de Rotas</h1>
                <p>visualize as rotas programadas</p>
            </div>

            <a href="../home_page/usuario_home.php" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>

            <div class="header">

                <div></div>

            </div>

                        <?php
                $mensagens = [
                    'excluido' => ['success', 'Rota excluída com sucesso!'],
                    'erro'     => ['danger', 'Não foi possível realizar a operação.']
                ];

                $codigo = $_GET['mensagem'] ?? '';

                if (isset($mensagens[$codigo])) {
                    [$tipo, $texto] = $mensagens[$codigo];
            ?>

                    <div class="alert alert-<?= $tipo ?> alert-dismissible fade show" role="alert">
                        <?= htmlspecialchars($texto) ?>

                        <button type="button" class="btn-close"
                                data-bs-dismiss="alert" aria-label="Fechar"></button>
                    </div>

            <?php } ?>

            <h2 class="page-title"></h2>

            <div class="d-flex justify-content-end mb-4">

                

            </div>

            <div class="users-table-box">

                <div class="table-responsive">

                    <table class="table mb-0 align-middle">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Horário</th>
                                <th>Ponto Inicial</th>
                                <th>Ponto Final</th>
                                <th>Distância</th>
                                <th>Trem Responsável</th>
                                
                            </tr>
                        </thead>

                        <tbody id="listaRotas">

                            <?php if ($resultado && mysqli_num_rows($resultado) > 0) { ?>

                                <?php while ($rota = mysqli_fetch_assoc($resultado)) { ?>

                                    <tr>
                                       <td><?php echo $rota["id_Rota"]; ?></td>

                                        <td><?php echo $rota["nome_rota"]; ?></td>

                                        <td><?php echo $rota["horario_rota"]; ?></td>

                                        <td><?php echo $rota["ponto_inicial"]; ?></td>

                                        <td><?php echo $rota["ponto_final"]; ?></td>

                                        <td><?php echo $rota["distancia"]; ?></td>

                                                                <td>
                                    <?= !empty($rota["nome_trem"])
                                        ? htmlspecialchars($rota["nome_trem"])
                                        : '<span class="text-muted">Sem trem vinculado</span>' ?>
                                </td>

                                        <td class="text-center text-nowrap">

                                            

                                        </td>
                                    </tr>

                                <?php } ?>

                            <?php } else { ?>

                                <tr>
                                    <td colspan="9" class="text-center py-4 text-muted">
                                        Nenhuma rota cadastrada.
                                    </td>
                                </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>