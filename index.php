
<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include "infra/conexao.php";

$mensagemLogin = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    $sql = "SELECT * FROM usuario WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();

            if (password_verify($senha, $usuario['senha'])) {

                if (($usuario['status'] ?? '') !== 'Ativo') {
                    $mensagemLogin = "Sua conta está inativa. Entre em contato com um administrador.";
                } else {
                    session_regenerate_id(true);

                    $_SESSION['id_Usuario'] = $usuario['id_Usuario'];
                    $_SESSION['nome'] = $usuario['nome'];
                    $_SESSION['email'] = $usuario['email'];
                    $_SESSION['tipo_conta'] = $usuario['tipo_conta'];

                    $stmt->close();

                    if ($usuario['tipo_conta'] === 'Administrador') {
                        header("Location: public/Administrador/home_page/adm_home.php");
                    } else {
                        header("Location: public/Usuário/home_page/usuario_home.php");
                    }

                    exit;
                }
            } else {
                $mensagemLogin = "Senha incorreta!";
            }
        } else {
            $mensagemLogin = "E-mail não encontrado!";
        }

        $stmt->close();
    } else {
        $mensagemLogin = "Erro ao consultar o banco de dados.";
    }
}
?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XRail</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="style/style.css">

</head>

<body id="login">


<?php if ($mensagemLogin !== ""): ?>
    <div id="alertaLogin" style="
        position: fixed !important;
        top: 28px !important;
        left: 50% !important;
        right: auto !important;
        transform: translateX(-50%) !important;
        z-index: 999999 !important;

        display: flex;
        align-items: center;
        gap: 16px;

        width: 390px;
        max-width: calc(100vw - 32px);
        box-sizing: border-box;

        padding: 20px 24px;
        overflow: hidden;

        background: rgba(8, 12, 25, 0.97);
        color: #ffffff;

        border: 1px solid rgba(54, 99, 230, 0.65);
        border-left: 5px solid #3159d9;
        border-radius: 12px;

        box-shadow: 0 10px 32px rgba(0, 0, 0, 0.4);

        font-family: Arial, sans-serif;
        text-align: left;
    ">

        <div style="
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;

            width: 44px;
            height: 44px;

            background: rgba(49, 89, 217, 0.16);
            border: 1px solid #3159d9;
            border-radius: 50%;

            color: #6688ff;
            font-size: 25px;
            font-weight: 600;
        ">!</div>

        <div style="
            display: flex;
            flex-direction: column;
            gap: 6px;
            min-width: 0;
        ">
            <strong style="
                color: #ffffff;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: 0.2px;
            ">
                Falha na autenticação
            </strong>

            <span style="
                color: #c8d1e8;
                font-size: 14px;
                line-height: 1.5;
                overflow-wrap: anywhere;
            ">
                <?php echo htmlspecialchars(
                    $mensagemLogin,
                    ENT_QUOTES,
                    'UTF-8'
                ); ?>
            </span>
        </div>

        <div style="
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            width: 100%;
            background: #3159d9;
            transform-origin: left;
            animation: diminuirBarraXRail 3s linear forwards;
        "></div>
    </div>

    <style>
        @keyframes diminuirBarraXRail {
            from {
                transform: scaleX(1);
            }
            to {
                transform: scaleX(0);
            }
        }
    </style>

    <script>
        setTimeout(function () {
            const alerta = document.getElementById('alertaLogin');

            if (alerta) {
                alerta.style.transition =
                    'opacity 0.4s ease, margin-top 0.4s ease';

                alerta.style.opacity = '0';
                alerta.style.marginTop = '-10px';

                setTimeout(function () {
                    alerta.remove();
                }, 400);
            }
        }, 3000);
    </script>
<?php endif; ?>


<main class="dividido">

    <div class="painel-logo">
        <img id="logo" src="assets/images/tela.png" alt="Logo XRail">
    </div>

    <div id="colorir">

        <form id="formulario" method="POST" class="needs-validation">

            <h2 class="text-center mb-4">
                <b>LOGIN</b>
            </h2>

            <div class="mb-3">
                <label for="usuario" id="branco" class="form-label">
                    E-mail
                </label>

                <input type="email" class="form-control"
                    id="usuario" name="email" required>

                <div id="erro-usuario" class="erro"></div>
            </div>

            <div class="mb-3">
                <label for="senha" id="branco" class="form-label">
                    Senha
                </label>

                <input type="password" class="form-control"
                    id="senha" name="senha" required>

                <div id="erro-senha" class="erro"></div>
            </div>

            <div id="mensagem"></div>

            <!-- <div class="toggle" id="toggle">
                <p>Não tem conta? Solicite!</p>
            </div> -->

            <div class="text-center mt-4">
                <button class="btn btn-primary" type="submit">
                    Entrar
                </button>
            </div>

        </form>

    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>

<script src="script/script.js"></script>

</body>
</html>



<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>XRail | Monitoramento Ferroviário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="style/style.css">
</head>

<body>

    <!-- PAINEL LATERAL -->
    <aside class="painel-lateral">

        <a href="#inicio" class="logo">
            <img src="assets/images/Simbolo.png" alt="Logo XRail">
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
                                <a class="nav-link" href="#login">
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

                <a href="#login" class="botao-login">
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
