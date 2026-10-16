<?php
    
include "../../../../infra/conexao.php";

    ?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>XRail - Usuários</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"crossorigin="anonymous">
    <link rel="stylesheet" href="../../../../style/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>


    <aside class="sidebar">

        <div class="text-center mb-5">
            <img src="../../../../assets/images/Simbolo.png" class="logo">
        </div>

        <nav class="d-flex flex-column">

            <a href="../home_page/adm_home.php" class="menu-link">
                <i class="bi bi-house-fill"></i>
                <span>Início</span>
            </a>

            <a href="../monitoramento_page/adm_monitoramento.php" class="menu-link">
                <i class="bi bi-graph-up"></i>
                <span>Monitoramento</span>
            </a>

            <a href="../relatorios_page/relatorios.php" class="menu-link">
                <i class="bi bi-file-earmark-text"></i>
                <span>Relatórios</span>
            </a>

            <a href="../usuario_page/usuario.php" class="menu-link active">
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


            <div class="header">


                <div class="user">

                    <span>
                        <img src="../../../../assets/images/usuário.png"
                            class="img-fluid">

                        Administrador
                    </span>

                </div>

            </div>


           


    


            </div>


                <a href="adicionar_rota.php"
                    class="btn-custom"
                    style="height:42px; white-space:nowrap; text-decoration:none;">

                    + Adicionar rota

                </a>

            </div>



            <div class="users-table-box">

                <table class="table mb-0">

                    <thead>

                        <tr>

                            <th>
                                ID
                            </th>

                            <th>
                                Nome
                            </th>

                            <th>
                                Horário
                            </th>

                            <th>
                                Ponto Inicial
                            </th>

                            <th>
                                Ponto Final
                            </th>

                            <th>
                                Distância
                            </th>

                            <th>
                                Sensor ID
                            </th>

                            <th class="text-center">
                                Ações
                            </th>

                        </tr>

                    </thead>


                    <tbody id="listaRotas">


                        <?php
                        $sql = "SELECT * FROM rota";
                        $resultado = mysqli_query($conn, $sql);

                        while ($rota = mysqli_fetch_assoc($resultado)) {
                        ?>

                            <tr>
                                <td><?php echo $rota["id_Rota"]; ?></td>

                                <td><?php echo $rota["nome_rota"]; ?></td>

                                <td><?php echo $rota["horario_rota"]; ?></td>

                                <td><?php echo $rota["ponto_inicial"]; ?></td>

                                <td><?php echo $rota["ponto_final"]; ?></td>

                                <td><?php echo $rota["distancia"]; ?></td>

                                <td><?php echo $rota["sensor_id"]; ?></td>

                                <td class="text-center">

                                    <a class="botao_usuario" href="visualizar_rota.php?id=<?php echo $rota ["id_Rota"]; ?>">
                                        <button class="btn btn-primary">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </a>

                                    <a class="botao_usuario" href="editar_rota.php?id=<?php echo $rota["id_Rota"]; ?>">
                                        <button class="btn btn-secondary">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    </a>

                                    <a class="botao_usuario" href="excluir_rota.php?id=<?php echo $rota["id_Rota"]; ?>"
                                        onclick="return confirm('Tem certeza que deseja excluir esta rota?');">
                                        <button class="btn btn-danger">
                                            <i class="bi bi-person-dash"></i>
                                        </button>
                                    </a>

                                </td>

                            </tr>

                        <?php }
                         ?>
                </tbody>
            </div>
        </div>

        </div>

    </main>

</body>

</html>