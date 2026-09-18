<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XRail - Relatórios</title>

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

            <a href="../home_page/home.php" class="menu-link">
                <i class="bi bi-house-fill"></i>
                <span>Início</span>
            </a>

            <a href="../monitoramento_page/monitoramento.php" class="menu-link active">
                <i class="bi bi-graph-up"></i>
                <span>Monitoramento</span>
            </a>

            <a href="relatorios.php" class="menu-link">
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
                <h1 class="titulo">Relatórios</h1>
                <div class="user">
                    <span>
                        <a href="#" class="btn btn-primary">Gerar Relatório</a>
                    </span>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row align-items-end g-3">

                                <div class="col-md-4">
                                    <label for="periodo" class="form-label">
                                        Período
                                    </label>

                                    <select id="periodo" class="form-select">
                                        <option selected>Selecione o período</option>
                                        <option value="1">Última semana</option>
                                        <option value="2">Último mês</option>
                                        <option value="3">Último ano</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="tipoRelatorio" class="form-label">
                                        Tipo de Relatório
                                    </label>

                                    <select id="tipoRelatorio" class="form-select">
                                        <option selected>Selecione o tipo de relatório</option>
                                        <option value="1">Relatório de Falhas Detectadas</option>
                                        <option value="2">Relatório de Desempenho Operacional</option>
                                        <option value="3">Relatório Velocidade dos Trens</option>
                                        <option value="4">Relatório de Temperatura dos Trilhos</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <a href="#" class="btn btn-primary w-100">
                                        Filtrar
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            

                            <div class="row align-items-end g-3">

                                <div class="col-md-4">
                                    <label for="periodo" class="form-label">ID</label>
                                    <label for="periodo" class="form-label">Tipo de Relatório</label>
                                    <label for="periodo" class="form-label">Período</label>
                                    <label for="periodo" class="form-label">Gerado </label>

                                    <div class="container text-center">
                                        <div class="row">
                                            <div class="col order-last">
                                                10
                                            </div>
                                            <div class="col">
                                                Desempenho Operacional
                                            </div>
                                            <div class="col order-first">
                                                Última semana
                                            </div>
                                            <div class="col">
                                                2023-10-01
                                            </div>
                                            <div>
                                                Ações
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
                crossorigin="anonymous"></script>

</body>

</html>