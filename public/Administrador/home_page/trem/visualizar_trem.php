<?php

require_once __DIR__ . '/../../../../infra/conexao.php';

$sql = "SELECT trem.*, usuario.nome AS nome_usuario
        FROM trem
        LEFT JOIN usuario
        ON trem.Usuario_id_Usuario = usuario.id_Usuario";

$resultado = mysqli_query($conn, $sql);

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

            <a href="../../home_page/adm_home.php/sensor/cadastro_sensor.php" class="menu-link active">
                <i class="bi bi-house-fill"></i>
                <span>Início</span>
            </a>


            <a href="../../home_page/rotas/cadastro_rotas.php" class="menu-link">
                <i class="bi bi-train-freight-front"></i>
                <span>Rotas</span>
            </a>

            <a href="../../home_page/usuarios/usuario.php" class="menu-link ">
                <i class="bi bi-people"></i>
                <span>Usuários</span>
            </a>


            <a href="../../home_page/relatorios/relatorios.php" class="menu-link">
                <i class="bi bi-file-earmark-text"></i>
                <span>Relatórios</span>
            </a>

            <a href="../../logout.php" class="menu-link">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
            </a>

        </nav>

    </aside>

        <main class="main">

            <div class="container-fluid">

                <div class="header">
                </div>

                <hr>

                <div class="sensor-container">

                    <div class="sensor-header">
                        <h3>Trens</h3>
                    </div>

                        <div class="users-table-box">
                            
                            <table class="table mb-0" id="tabelaUsuarios">
                                <thead>
                                    <tr>
                                        <th>ID do trem</th>
                                        <th>Nome</th>
                                        <th>Carga</th>
                                        <th>Velocidade</th>
                                        <th>Usuário</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody id="corpoTabela">
                            
                                <?php
                                    $sql = "SELECT * FROM trem";
                                    $resultado = mysqli_query($conn, $sql);

                                    while ($trem = mysqli_fetch_assoc($resultado)) {
                                    ?>

                                    
                                        <tr>
                                            <td><?php echo $trem['id_Trem'] ?></td>
                                            <td><?php echo $trem['nome_trem'] ?></td>
                                            <td><?php echo $trem['carga'] ?></td>
                                            <td><?php echo $trem['velocidade'] ?></td>
                                            <td><?= !empty($trem['nome_usuario']) 
                                            ? htmlspecialchars($trem['nome_usuario']): 'Não vinculado' ?></td>

                                            <td class="text-center">
                                        
                                                <a href="editar_trem.php?id_Trem=<?= $trem['id_Trem'] ?>"
                                                class="btn btn-secondary">
                                                    <i class="bi bi-pencil"></i>
                                                </a>

                                                <a href="delete_trem.php?id_Trem=<?= $trem['id_Trem'] ?>"
                                                class="btn btn-danger"
                                                onclick="return confirm('Tem certeza que deseja excluir este sensor?');">
                                                    <i class="bi bi-trash"></i>
                                                </a>

                                            </td>

                                        </tr>

                                    <?php } ?>
                                        
                                </tbody>
                            </table>
                        </div>

                </div>

            </div>

        </main>

    </body>

</html>
