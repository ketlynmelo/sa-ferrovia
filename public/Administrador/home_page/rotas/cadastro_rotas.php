<?php
session_start();
require_once "../../../../infra/conexao.php";

$sql = "SELECT * FROM rota ORDER BY id_Rota DESC";
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

            <div class="header">

                <div></div>

                <div class="user">
                    <span>
                        <img src="../../../../assets/images/usuário.png"
                            class="img-fluid"
                            alt="Perfil do usuário">
                        Administrador
                    </span>
                </div>

            </div>

            <h2 class="page-title">Gerenciamento de Rotas</h2>

            <div class="d-flex justify-content-end mb-4">

                <a href="../rotas/adicionar_rota.php"
                    class="btn-custom"
                    style="height:42px; display:inline-flex; align-items:center; justify-content:center; white-space:nowrap; text-decoration:none;">

                    <i class="bi bi-plus-lg me-2"></i>
                    Adicionar rota

                </a>

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
                                <th>Sensor ID</th>
                                <th class="text-center">Ações</th>
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

                                <td><?php echo $rota["sensor_id"]; ?></td>

                                        <td class="text-center text-nowrap">

                                            <a class="btn btn-secondary btn-sm me-1"
                                                href="editar_rota.php?id=<?= urlencode((string)$rota["id_Rota"]) ?>"
                                                title="Editar rota">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <a class="btn btn-danger btn-sm"
                                                href="excluir_rota.php?id=<?= urlencode((string)$rota["id_Rota"]) ?>"
                                                onclick="return confirm('Tem certeza que deseja excluir esta rota?');"
                                                title="Excluir rota">
                                                <i class="bi bi-trash"></i>
                                            </a>

                                        </td>
                                    </tr>

                                <?php } ?>

                            <?php } else { ?>

                                <tr>
                                    <td colspan="8" class="text-center py-4 text-muted">
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