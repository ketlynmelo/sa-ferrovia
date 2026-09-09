<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XRail</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

    <aside class="sidebar">

        <div class="text-center mb-5">

            <img src="../assets/images/Simbolo.png" class="logo">

        </div>

        <nav class="d-flex flex-column">

            <a href="public/home.html" class="menu-link active">

                <i class="bi bi-house-fill"></i>
                <span>Início</span>

            </a>

            <a href="public/monitoramento.html" class="menu-link">

                <i class="bi bi-graph-up"></i>
                <span>Monitoramento</span>

            </a>

            <a href="public/relatorios.html" class="menu-link">

                <i class="bi bi-file-earmark-text"></i>
                <span>Relatórios</span>

            </a>

            <a href="public/usuario.html" class="menu-link">

                <i class="bi bi-people"></i>
                <span>Usuários</span>

            </a>

            <a href="public/login.html" class="menu-link">

                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>

            </a>

        </nav>

    </aside>

    <main class="main">

        <div class="container-fluid">

            <div class="tab-pane fade" id="editarSensor">
                <div class="form-card">
                    <div class="page-title">Editar Sensor</div>

                    <form class="row g-3 needs-validation" novalidate>

                        <div class="col-12">
                            <label for="es_nome" class="form-label">Nome do sensor</label>
                            <input type="text" class="form-control" id="es_nome" value="Lazum" />
                        </div>

                        <div class="col-12">
                            <label for="es_tipo" class="form-label">Tipos de Dados Monitorado</label>
                            <input type="text" class="form-control" id="es_tipo" value="Velocidade" readonly />
                        </div>

                        <div class="col-12">
                            <label for="es_id" class="form-label">ID</label>
                            <input type="text" class="form-control" id="es_id" value="150" readonly />
                        </div>

                        <div class="col-12">
                            <div class="form-check mb-1">
                                <input class="form-check-input" type="text" name="es_assoc" id="es_loc_radio"
                                    value="localizacao" />
                                <label class="form-check-label" for="es_loc_radio">Localização</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-check mb-1">
                                <input class="form-check-input" type="radio" name="es_assoc" id="es_trem_radio"
                                    value="trem" checked />
                                <label class="form-check-label" for="es_trem_radio">Trem vinculado</label>
                            </div>
                            <select class="form-select" id="es_trem">
                            </select>
                        </div>

                        <div class="col-12 d-flex gap-2 mt-3">
                            <button type="button" class="btn btn-cancelar">Cancelar</button>
                            <button type="submit" class="btn btn-salvar">Salvar</button>
                        </div>

                    </form>

                </div>
            </div>


        </div>

    </main>

</body>

</html>