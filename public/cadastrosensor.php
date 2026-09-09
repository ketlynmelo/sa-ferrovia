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

            <div class="container" style="max-width: 820px; margin-top: 50px; padding-bottom: 60px;">

                <div class="tab-content">

                    <div class="tab-pane fade show active" id="cadastrarSensor">
                        <div class="form-card">
                            <div class="page-title">Cadastrar Sensor</div>

                            <form class="row g-3 needs-validation" novalidate>

                                <div class="col-12">
                                    <label for="cs_nome" class="form-label">Nome do sensor</label>
                                    <input type="text" class="form-control" id="cs_nome"
                                        placeholder="ex: sensor velocidade 03" />
                                </div>

                                <div class="col-12">
                                    <label for="cs_tipo" class="form-label">Tipos de Dados Monitorado</label>
                                    <select class="form-select" id="cs_tipo">
                                        <option value="" selected disabled>Selecione o tipo de dado</option>
                                        <option>Velocidade</option>
                                        <option>Temperatura</option>
                                        <option>Pressão</option>
                                        <option>Vibração</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="es_loc_radio">Localização</label>
                                    <input class="form-control" type="text" name="es_assoc" id="es_loc_radio"
                                        value="localizacao" />
                                </div>

                                <div class="col-12">
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="radio" name="cs_assoc" id="cs_trem_radio"
                                            value="trem" />
                                        <label class="form-check-label" for="cs_trem_radio">Trem vinculado</label>
                                    </div>
                                    <select class="form-select" id="cs_trem" disabled>
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

            </div>

        </div>

    </main>

</body>

</html>