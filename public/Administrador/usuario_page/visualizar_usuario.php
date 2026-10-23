<?php
session_start();

include "../../../infra/conexao.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if (!$id) {
    header("Location: usuario.php");
    exit;
}

$sql = "SELECT * FROM usuario WHERE id_Usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

$stmt->close();

if (!$usuario) {
    header("Location: usuario.php");
    exit;
}
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


            <a href="monitoramento_page/adm_monitoramento.php" class="menu-link active"  >
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

    <div class="rotas-header">
        <div>
            <h1>Detalhes do Funcionário</h1>
            <p>Visualize as informações completas do funcionário cadastrado.</p>
        </div>

        <a href="javascript:history.back()" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
    </div>

    <div class="card-dashboard bg-white mb-4">

        <div class="row align-items-center g-4">

            <div class="col-auto">
                <div class="icon-card" style="width: 90px; height: 90px; border-radius: 50%;">
                    <i class="bi bi-person-fill" style="font-size: 2.8rem;"></i>
                </div>
            </div>

            <div class="col">
                <h3 class="fw-bold mb-2">
                    <?= htmlspecialchars($usuario["nome"]) ?>
                </h3>

                <span class="badge badge-admin rounded-pill px-3 py-2">
                    <i class="bi bi-shield-check"></i>
                    <?php echo htmlspecialchars($usuario["tipo_conta"]); ?>
                </span> 
            </div>

            <div class="col-md-3">
                <div class="border rounded-3 p-3">
                    <div class="mb-2">
                        <span class="badge-ativo">
                            <i class="bi bi-circle-fill" style="font-size: 8px;"></i>
                            <?php echo htmlspecialchars($usuario["status"]); ?>
                        </span>
                    </div>

                    <small class="text-muted">
                        Status da conta
                    </small>
                </div>
            </div>

        </div>
    </div>

    <div class="card-dashboard bg-white">

        <h5 class="fw-bold mb-4">
            <i class="bi bi-person-vcard me-2" style="color: #44539c;"></i>
            Informações pessoais
        </h5>

        <div class="row g-4">

            <div class="col-md-6">
                <div class="border rounded-3 p-3 h-100">
                    <small class="text-muted d-block mb-2">
                        <i class="bi bi-hash me-2"></i>ID do funcionário
                    </small>
                    <span class="fw-semibold">
                    <?php echo $usuario["id_Usuario"]; ?>
                    </span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="border rounded-3 p-3 h-100">
                    <small class="text-muted d-block mb-2">
                        <i class="bi bi-person me-2"></i>Nome completo
                    </small>
                    <span class="fw-semibold">
                        <?php echo htmlspecialchars($usuario["nome"]); ?>
                    </span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="border rounded-3 p-3 h-100">
                    <small class="text-muted d-block mb-2">
                        <i class="bi bi-envelope me-2"></i>E-mail
                    </small>
                    <span class="fw-semibold text-break">
                        <?php echo htmlspecialchars($usuario["email"]); ?>
                    </span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="border rounded-3 p-3 h-100">
                    <small class="text-muted d-block mb-2">
                        <i class="bi bi-card-text me-2"></i>CPF
                    </small>
                    <span class="fw-semibold">
                        <?php echo htmlspecialchars($usuario["cpf"]);?>
                    </span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="border rounded-3 p-3 h-100">
                    <small class="text-muted d-block mb-2">
                        <i class="bi bi-calendar-event me-2"></i>Data de nascimento
                    </small>
                    <span class="fw-semibold">
                        <?php echo htmlspecialchars($usuario["data_nascimento"]); ?>
                    </span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="border rounded-3 p-3 h-100">
                    <small class="text-muted d-block mb-2">
                        <i class="bi bi-geo-alt me-2"></i>Endereço
                    </small>
                    <span class="fw-semibold">
                        <?php echo htmlspecialchars($usuario["endereco"]); ?>
                    </span>
                </div>
            </div>

        </div>

    </div>

    <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">

            <a href="../../usuario_page/usuarios.php" class="btn btn-outline-secondary mb-3">
               <i class="bi bi-arrow-left"></i> Voltar
            </a>


            <a href="editarfuncionario.php?id=<?= urlencode($usuario["id_Usuario"]) ?>"
               class="btn-custom d-inline-flex align-items-center justify-content-center gap-2">
                <i class="bi bi-pencil-square"></i>
                Editar funcionário
            </a>

        </div>

</main>
</body>

</html>