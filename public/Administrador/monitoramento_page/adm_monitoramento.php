<?php
include_once "../../../infra/conexao.php";
include_once "../../../infra/clima.php";
?>


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

            <a href="../home_page/adm_home.php" class="menu-link">
                <i class="bi bi-house-fill"></i>
                <span>Início</span>
            </a>


        <a href="../home_page/rotas/cadastro_rotas.php" class="menu-link ">
        <i class="bi bi-train-freight-front"></i>
        <span>Rotas</span>
        </a>


        <a href="adm_monitoramento.php" class="menu-link active"  >
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


            <a href="../../../logout.php" class="menu-link">
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
                        <img src="../../../assets/images/usuário.png" class="img-fluid"> Administrador
                    </span>
                </div>

            </div>

    <div class="container-pesquisa" >

  <!-- <h2>Monitoramento </h2> -->


  
                 <p class="clima-erro">
    <?= htmlspecialchars($mensagemErroClima) ?>
</p>


            
<div class="card-clima">
    <div class="clima-topo">
        <div>
            <h3>Clima atual</h3>
            <p class="clima-local">
                <i class="bi bi-geo-alt"></i>
                Joinville, Santa Catarina
            </p>
        </div>

        <i class="bi bi-cloud-sun clima-icone"></i>
    </div>

    <?php if ($clima !== null): ?>

        <div class="clima-temperatura">
            <img
                src="https://openweathermap.org/img/wn/<?= htmlspecialchars($clima['weather'][0]['icon']) ?>@2x.png"
                alt="Condição climática"
            >

            <strong>
                <?= number_format(
                    $clima['main']['temp'],
                    1,
                    ',',
                    '.'
                ) ?>°C
            </strong>
        </div>

        <p class="clima-condicao">
            <?= htmlspecialchars(
                ucfirst($clima['weather'][0]['description'])
            ) ?>
        </p>

        <div class="clima-info">
            <p>
                <i class="bi bi-droplet"></i>
                Umidade:
                <strong><?= (int) $clima['main']['humidity'] ?>%</strong>
            </p>

            <p>
                <i class="bi bi-cloud"></i>
                Nebulosidade:
                <strong><?= (int) $clima['clouds']['all'] ?>%</strong>
            </p>
        </div>

        <p class="clima-horario">
            <i class="bi bi-clock"></i>
            Última medição:
            <?= date('d/m/Y H:i', (int) $clima['dt']) ?>
        </p>

    <?php else: ?>

        <p class="clima-erro">
            Não foi possível carregar o clima.
            Tente novamente mais tarde.
        </p>

    <?php endif; ?>

    <small>
        Fonte:
        <a href="https://openweathermap.org/"
           target="_blank"
           rel="noopener noreferrer">OpenWeatherMap</a>
    </small>
</div>

<form  method="GET" action="monitoramento.php" class=" barra d-flex mb-4 " style="margin-top: 60px; margin-left: 20px; left: 570px; position: absolute;">
<input
type="number"
name="id"
class="form-control me-2"
placeholder="Digite o ID do trem"
required
>

<button type="submit" class="btn btn-primary">
    Pesquisar
</button>

</form>


    </div>

</main>


    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="../../script/script.js"></script>

</html>