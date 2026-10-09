

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

            <a href="../../../home_page/usuario_home.php" class="menu-link active">
                <i class="bi bi-house-fill"></i>
                <span>Início</span>
            </a>

            <a href="../../../monitoramento_page/usuario_monitoramento.php" class="menu-link">
                <i class="bi bi-graph-up"></i>
                <span>Monitoramento</span>
            </a>

            </a>

            <a href="../../../index.php" class="menu-link">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
            </a>

        </nav>

    </aside>

    <main class="main">

        <div class="container-fluid">

            <div class="header">

                <h1 class="titulo">
                    Bem vindo, Usuário!
                </h1>

                <div class="user">
                    <span>
                        <img src="../../../assets/images/usuário.png" class="img-fluid"> Usuário
                    </span>
                </div>

            </div>

            <hr>

<<<<<<< HEAD
           <div class="actions-top">

                <a href="../../../sensor/cadastrosensor.php" class="btn btn-custom">
                    Cadastrar Sensores
                </a>

                <a href="../../../trem/cadastrotrem.php" class="btn btn-custom">
                    Cadastrar Trem
                </a>

            </div>

=======
>>>>>>> 507db3974772af193ca782209dc4c973ba440395
            <div class="sensor-container">

                <div class="sensor-header">
                    <h3>Sensores</h3>
                </div>

                    <div class="users-table-box">
                        
                        <table class="table mb-0" id="tabelaUsuarios">
                            <thead>
                                <tr>
                                    <th>ID do sensor</th>
                                    <th>Nome</th>
                                    <th>Localização</th>
                                    <th>Tipo de Dado</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody id="corpoTabela">
                         
                               <?php
                                 $sql = "SELECT * FROM sensor";
                                 $resultado = mysqli_query($conn, $sql);

                                 while ($sensor = mysqli_fetch_assoc($resultado)) {
                        ?>
                                    <tr>
                                        <td><?php echo $sensor['id_Sensor'] ?></td>
                                        <td><?php echo $sensor['nome_sensor'] ?></td>
                                        <td><?php echo $sensor['localizacao'] ?></td>
                                        <td><?php echo $sensor['tipo_dado'] ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-secondary" href="public/sensor-editar.php? id=<?php echo $sensor['id'] ?>">Editar</a>
                                            <a class="btn btn-danger" href="public/sensor-excluir.php? id=<?php echo $sensor['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este sensor?')">Excluir</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                    
                            </tbody>
                        </table>
                    </div>

            </div>

        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="../../../script/script.js"></script>

</body>

</html>