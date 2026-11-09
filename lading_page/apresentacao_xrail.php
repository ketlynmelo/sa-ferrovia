
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>XRail | Monitoramento Ferroviário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../style/style.css">
</head>

<body>

    <!-- PAINEL LATERAL -->
    <aside class="painel-lateral">

        <a href="#inicio" class="logo">
            <img src="../assets/images/Simbolo.png" alt="Logo XRail">
        </a>

        <div class="texto-lateral">
            <span>TECNOLOGIA E INOVAÇÃO</span>
            <p>Movendo o futuro sobre trilhos.</p>
        </div>

    </aside>


    <!-- CONTEÚDO DA PÁGINA -->
    <main class="conteudo-pagina">

        <!-- INÍCIO -->
        <section class="hero" id="inicio">

            <nav class="navbar navbar-expand-lg navbar-dark">

                <div class="container-fluid px-4">

                    <a class="navbar-brand" href="#inicio">
                        XRail
                    </a>

                    <button class="navbar-toggler" type="button"
                        data-bs-toggle="collapse" data-bs-target="#menu">

                        <span class="navbar-toggler-icon"></span>

                    </button>

                    <div class="collapse navbar-collapse" id="menu">

                        <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">

                            <li class="nav-item">
                                <a class="nav-link" href="#inicio">Início</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#sobre">Sobre</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#funcionalidades">Funcionalidades</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#contato">Contato</a>
                            </li>

                            <li class="nav-item">
                                <a href="../index.php" class="botao-login">
                                    Entrar
                                </a>
                            </li>

                        </ul>

                    </div>
                </div>

            </nav>


            <div class="hero-conteudo">

                <div class="linha-destaque"></div>

                <span class="identificacao">MONITORAMENTO FERROVIÁRIO INTELIGENTE</span>

                <h1>
                    Movendo o futuro<br>
                    sobre trilhos.
                </h1>

                <p>
                    Tecnologia e inovação para monitorar operações
                    ferroviárias em tempo real, proporcionando
                    mais segurança e eficiência.
                </p>

                <a href="#sobre" class="botao-conhecer">
                    Conheça o XRail
                    <i class="bi bi-arrow-down-right"></i>
                </a>

            </div>


            <a href="#sobre" class="indicador-scroll">
                <i class="bi bi-chevron-down"></i>
            </a>

        </section>


        <!-- SOBRE -->
        <section class="secao sobre" id="sobre">

            <div class="container">

                <span class="identificacao">CONHEÇA NOSSO PROJETO</span>

                <h2>
                    A tecnologia transformando
                    o transporte ferroviário.
                </h2>

                <p>
                    O XRail é uma solução tecnológica voltada ao
                    monitoramento ferroviário em tempo real,
                    utilizando sensores IoT para acompanhar
                    informações importantes sobre os trens e
                    suas operações.
                </p>

                <p>
                    Por meio da coleta e análise de dados,
                    o sistema auxilia na identificação de falhas,
                    no acompanhamento operacional e na
                    manutenção preditiva.
                </p>

            </div>

        </section>


        <!-- FUNCIONALIDADES -->
        <section class="secao funcionalidades" id="funcionalidades">

            <div class="container">

                <span class="identificacao">TECNOLOGIA E INOVAÇÃO</span>

                <h2>Conheça nossas funcionalidades</h2>

                <p class="descricao-secao">
                    Recursos desenvolvidos para proporcionar
                    maior controle e eficiência operacional.
                </p>

                <div class="row g-4 mt-4">

                    <div class="col-md-6 col-lg-3">
                        <div class="card-funcionalidade">
                            <i class="bi bi-train-front"></i>

                            <h3>Monitoramento dos trens</h3>

                            <p>
                                Acompanhamento das informações
                                operacionais dos trens.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="card-funcionalidade">
                            <i class="bi bi-broadcast"></i>

                            <h3>Sensores IoT</h3>

                            <p>
                                Coleta de dados de velocidade,
                                temperatura e vibração.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="card-funcionalidade">
                            <i class="bi bi-exclamation-triangle"></i>

                            <h3>Identificação de falhas</h3>

                            <p>
                                Identificação de possíveis
                                irregularidades operacionais.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="card-funcionalidade">
                            <i class="bi bi-graph-up-arrow"></i>

                            <h3>Manutenção preditiva</h3>

                            <p>
                                Análise de dados para auxiliar
                                na prevenção de problemas.
                            </p>
                        </div>
                    </div>

                </div>

            </div>

        </section>


        <!-- CONTATO / RODAPÉ -->
        <footer class="rodape" id="contato">

            <div class="container">

                <h2>XRail</h2>

                <p>Movendo o futuro sobre trilhos.</p>

                <a href="../index.php" class="botao-login">
                    Acessar plataforma
                </a>

                <hr>

                <small>
                    © 2026 XRail. Todos os direitos reservados.
                </small>

            </div>

        </footer>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
