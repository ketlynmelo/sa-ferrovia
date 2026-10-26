
<?php
session_start();

require_once "../../../infra/conexao.php";

if (
    !isset($_SESSION['id_Usuario']) ||
    ($_SESSION['tipo_conta'] ?? '') !== 'Administrador'
) {
    header("Location: ../../../index.php");
    exit;
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: usuario.php");
    exit;
}

$id_Usuario = (int) $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM usuario WHERE id_Usuario = ?");
$stmt->bind_param("i", $id_Usuario);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    header("Location: usuario.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>XRail - Editar Usuário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <aside class="sidebar">
        <div class="text-center mb-5">
            <img src="../../../assets/images/Simbolo.png" class="logo" alt="XRail">
        </div>

        <nav class="d-flex flex-column">
            <a href="../home_page/adm_home.php" class="menu-link">
                <i class="bi bi-house-fill"></i>
                <span>Início</span>
            </a>

            <a href="../home_page/rotas/cadastro_rotas.php" class="menu-link">
                <i class="bi bi-train-freight-front"></i>
                <span>Rotas</span>
            </a>

            <a href="../monitoramento_page/adm_monitoramento.php" class="menu-link">
                <i class="bi bi-graph-up"></i>
                <span>Monitoramento</span>
            </a>

            <a href="../relatorios_page/relatorios.php" class="menu-link">
                <i class="bi bi-file-earmark-text"></i>
                <span>Relatórios</span>
            </a>

            <a href="usuario.php" class="menu-link active">
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
                <div></div>

                <div class="user">
                    <span>
                        <img src="../../../assets/images/usuário.png" class="img-fluid" alt="">
                        Administrador
                    </span>
                </div>
            </div>

            <h2 class="page-title">Editar Usuário</h2>

            <div class="editar-usuario-card">

                <div class="editar-usuario-cabecalho">
                    <div class="editar-usuario-icone">
                        <i class="bi bi-person-gear"></i>
                    </div>

                    <div>
                        <h3>Dados do funcionário</h3>
                        <p>Atualize as informações cadastradas no sistema.</p>
                    </div>
                </div>

                <form action="atualizar_usuario.php" method="POST">

                    <input type="hidden" name="id_Usuario"
                        value="<?= (int) $row['id_Usuario'] ?>">

                    <div class="editar-usuario-grid">

                        <div class="editar-campo">
                            <label for="nome">Nome completo</label>
                            <input type="text" class="form-control" name="nome" id="nome"
                                value="<?= htmlspecialchars($row['nome'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>

                        <div class="editar-campo">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" name="cpf" id="cpf"
                                value="<?= htmlspecialchars($row['cpf'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>

                        <div class="editar-campo">
                            <label for="data_nascimento">Data de nascimento</label>
                            <input type="date" class="form-control" name="data_nascimento"
                                id="data_nascimento"
                                value="<?= htmlspecialchars($row['data_nascimento'], ENT_QUOTES, 'UTF-8') ?>"
                                required>
                        </div>

                        <div class="editar-campo">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="<?= htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>

                        <div class="editar-campo campo-completo">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" name="endereco" id="endereco"
                                value="<?= htmlspecialchars($row['endereco'], ENT_QUOTES, 'UTF-8') ?>" required>
                        </div>

                        <div class="editar-campo">
                            <label for="senha">Nova senha</label>
                            <input type="password" class="form-control" name="senha" id="senha"
                                placeholder="Digite a nova senha" required>
                        </div>

                        <div class="editar-campo">
                            <label for="tipo_conta">Tipo de conta</label>
                            <select class="form-select" name="tipo_conta" id="tipo_conta" required>
                                <option value="Administrador"
                                    <?= $row['tipo_conta'] === 'Administrador' ? 'selected' : '' ?>>
                                    Administrador
                                </option>

                                <option value="Usuário"
                                    <?= $row['tipo_conta'] === 'Usuário' ? 'selected' : '' ?>>
                                    Usuário
                                </option>
                            </select>
                        </div>

                        <div class="editar-campo">
                            <label for="status">Status da conta</label>
                            <select class="form-select" name="status" id="status" required>
                                <option value="Ativo"
                                    <?= $row['status'] === 'Ativo' ? 'selected' : '' ?>>
                                    Ativo
                                </option>

                                <option value="Inativo"
                                    <?= $row['status'] === 'Inativo' ? 'selected' : '' ?>>
                                    Inativo
                                </option>
                            </select>
                        </div>

                    </div>

                    <div class="editar-usuario-acoes">
                        <a href="usuario.php" class="btn-editar-voltar">
                            <i class="bi bi-arrow-left"></i>
                            Voltar
                        </a>

                        <button type="submit" class="btn-editar-salvar">
                            <i class="bi bi-check-lg"></i>
                            Salvar alterações
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </main>

</body>
</html>
