<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XRail</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <aside class="sidebar">

        <div class="text-center mb-5">
            <img src="../../assets/images/Simbolo.png" class="logo">
        </div>

        <nav class="d-flex flex-column">

            <a href="../home_page/home.php" class="menu-link active">
                <i class="bi bi-house-fill"></i>
                <span>Início</span>
            </a>

            <a href="../monitoramento_page/monitoramento.php" class="menu-link">
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

            <a href="../../index.php" class="menu-link">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
            </a>

        </nav>

    </aside>

    <main class="main">

        <div class="container-fluid">

            <div class="header">

                <h1 class="titulo">
                    Bem vindo, Administrador!
                </h1>

                <div class="user">
                    <span>
                        <img src="../../assets/images/usuário.png" class="img-fluid"> Administrador
                    </span>
                </div>

            </div>

            <hr>

           <div class="actions-top">

                <a href="sensor/cadastrosensor.php" class="btn btn-custom">
                    Cadastrar Sensores
                </a>

                <a href="trem/cadastrotrem.php" class="btn btn-custom">
                    Cadastrar Trem
                </a>

            </div>

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
                                    <th>Tipo de Dado</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody id="corpoTabela">
                                
                            </tbody>
                        </table>
                    </div>

            </div>

        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="../../script/script.js"></script>

</body>

</html>