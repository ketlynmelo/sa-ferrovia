
<link rel="stylesheet" href="../style/style.css">
<?php


$relatorios = [
    [
        'id' => 10,
        'tipo' => 'Desempenho Operacional',
        'periodo' => '01/05/2025 a 01/06/2025',
        'gerado_em' => '01/05/2025'
    ],
    [
        'id' => 11,
        'tipo' => 'Falhas Detectadas',
        'periodo' => '03/04/2025 a 03/06/2025',
        'gerado_em' => '03/04/2025'
    ],
    [
        'id' => 12,
        'tipo' => 'Velocidade dos Trens',
        'periodo' => '10/07/2026 a 03/12/2026',
        'gerado_em' => '10/07/2026'
    ],
    [
        'id' => 13,
        'tipo' => 'Temperatura dos Trilhos',
        'periodo' => '15/04/2026 a 09/09/2026',
        'gerado_em' => '15/04/2026'
    ]
];

$periodoFiltro = $_GET['periodo'] ?? '';
$tipoFiltro = $_GET['tipo'] ?? '';


$relatoriosFiltrados = array_filter($relatorios, function ($relatorio) use ($periodoFiltro, $tipoFiltro) {

    $correspondePeriodo = true;
    $correspondeTipo = true;

    if ($tipoFiltro !== '') {
        $correspondeTipo = $relatorio['tipo'] === $tipoFiltro;
    }

    if ($periodoFiltro !== '') {
        $correspondePeriodo = true;
    }

    return $correspondePeriodo && $correspondeTipo;
});
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>XRail - Relatórios</title>

    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"  rel="stylesheet"  >

    <link   rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"  >

    <link rel="stylesheet"   href="../../style/style.css"  >

</head>


<body>


<aside class="sidebar">

    <div class="text-center mb-5">

        <img  src="../../assets/images/Simbolo.png"  class="logo"  alt="XRail" >

    </div>


    <nav class="d-flex flex-column">

        <a href="../home_page/home.php"  class="menu-link">
            <i class="bi bi-house-fill"></i>
            <span>Início</span>
        </a>


        <a href="../monitoramento_page/monitoramento.php" class="menu-link"  >
            <i class="bi bi-graph-up"></i>
            <span>Monitoramento</span>
        </a>


        <a href="relatorios.php" class="menu-link active" >
            <i class="bi bi-file-earmark-text"></i>
            <span>Relatórios</span>
        </a>


        <a href="../usuario_page/usuario.php" class="menu-link" >
         <i class="bi bi-people"></i>
            <span>Usuários</span>
        </a>


        <a href="../../index.php"class="menu-link"  >
            <i class="bi bi-box-arrow-right"></i>
            <span>Sair</span>
        </a>

    </nav>

</aside>


<main class="main">

    <div class="container-fluid">


        <div class="header">

            <h1 class="titulo"> Relatórios </h1>


            <div class="user">
                <a href="gerar_relatorio.php"class="btn btn-primary">
                 <i class="bi bi-file-earmark-plus"></i> Gerar novo Relatório
                </a>

            </div>

        </div>


        <hr>

        <div class="card filtros-card mb-4">

            <div class="card-body">

                <form class="form_registro" method="GET"  action="relatorios.php"  >

                    <div class="row align-items-end g-3">


                        <div class="col-md-4">

                            <label for="periodo"  class="form-label"  > Período</label>


                            <select name="periodo" id="periodo" class="form-select">

                                <option value=""> Todos</option>

                                <option value="semana" <?= $periodoFiltro === 'semana' ? 'selected' : '' ?> >Última semana </option>
                                <option value="mes"<?= $periodoFiltro === 'mes' ? 'selected' : '' ?>>Último mês </option>
                                 <option value="ano"<?= $periodoFiltro === 'ano' ? 'selected' : '' ?>>Último ano</option>

                            </select>

                        </div>


                        <div class="col-md-4">

                            <label for="tipo"class="form-label">Tipo de Relatório </label>

                            <select name="tipo"id="tipo"class="form-select">

                                <option value="">Todos</option>
                                <option value="Falhas Detectadas" <?= $tipoFiltro === 'Falhas Detectadas' ? 'selected' : '' ?>>Falhas Detectadas</option>
                                <option value="Desempenho Operacional"<?= $tipoFiltro === 'Desempenho Operacional' ? 'selected' : '' ?>>Desempenho Operacional</option>
                                <option value="Velocidade dos Trens" <?= $tipoFiltro === 'Velocidade dos Trens' ? 'selected' : '' ?>>Velocidade dos Trens</option>
                                <option value="Temperatura dos Trilhos" <?= $tipoFiltro === 'Temperatura dos Trilhos' ? 'selected' : '' ?>>Temperatura dos Trilhos</option>

                            </select>

                        </div>



                        <div class="col-md-2">

                            <button
                                type="submit" class="btn btn-primary w-100">Filtrar</button>

                        </div>

                    </div>

                </form>

            </div>

        </div>



        <div class="relatorios-container">


            <h2 class="subtitulo">Relatórios Gerados</h2>


            <div class="table-responsive">

                <table class="table tabela-relatorios">



                    <thead>

                        <tr>

                            <th>ID</th>

                            <th>
                                Tipo de Relatório
                            </th>

                            <th>
                                Período
                            </th>

                            <th>
                                Gerado em
                            </th>

                            <th class="text-center">
                                Ações
                            </th>

                        </tr>

                    </thead>



                    <tbody>

                    <?php if (count($relatoriosFiltrados) > 0): ?>

                        <?php foreach ($relatoriosFiltrados as $relatorio): ?>

                            <tr>

                                <td>
                                    <?= htmlspecialchars($relatorio['id']) ?>
                                </td>


                                <td>
                                    <?= htmlspecialchars($relatorio['tipo']) ?>
                                </td>


                                <td>
                                    <?= htmlspecialchars($relatorio['periodo']) ?>
                                </td>


                                <td>
                                    <?= htmlspecialchars($relatorio['gerado_em']) ?>
                                </td>


                                <td class="text-center">

                                    <a
                                        href="baixar_relatorio.php?id=<?= $relatorio['id'] ?>"
                                        class="btn btn-success btn-download"
                                        title="Baixar relatório"
                                    >

                                        <i class="bi bi-download"></i>

                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td
                                colspan="5"
                                class="text-center py-4"
                            >
                                Nenhum relatório encontrado.

                            </td>

                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>


    </div>

</main>



<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
></script>


</body>

</html>

