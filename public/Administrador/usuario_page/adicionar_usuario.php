
<?php
require_once "../../../infra/conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>XRail - Cadastrar Usuário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="pagina-cadastro-usuario">

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

            <h2 class="page-title">Cadastrar Usuário</h2>

            <p class="subtitulo-cadastro">
                Cadastre um novo usuário ou administrador no sistema XRail.
            </p>

            <div class="cadastro-usuario-card">

                <div class="cadastro-usuario-header">
                    <div class="cadastro-usuario-icone">
                        <i class="bi bi-person-plus-fill"></i>
                    </div>

                    <div>
                        <h3>Informações da conta</h3>
                        <p>Preencha os dados para cadastrar uma nova conta.</p>
                    </div>
                </div>

                <form action="cadastrar_usuario.php" method="POST">

                    <div class="cadastro-usuario-grid">

                        <div class="campo-cadastro">
                            <label for="nome">Nome completo</label>
                            <input type="text" name="nome" id="nome"
                                class="form-control" placeholder="Digite o nome completo" required>
                        </div>

                        <div class="campo-cadastro">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" id="cpf"
                                class="form-control" placeholder="Digite o CPF" required>
                        </div>

                        <div class="campo-cadastro">
                            <label for="data_nascimento">Data de nascimento</label>
                            <input type="date" name="data_nascimento" id="data_nascimento"
                                class="form-control" required>
                        </div>

                        <div class="campo-cadastro">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email"
                                class="form-control" placeholder="exemplo@email.com" required>
                        </div>

                        <div class="campo-cadastro campo-cadastro-completo">
                            <label for="endereco">Endereço</label>
                            <input type="text" name="endereco" id="endereco"
                                class="form-control" placeholder="Digite o endereço completo" required>
                        </div>

                        <div class="campo-cadastro">
                            <label for="senha">Senha inicial</label>
                            <input type="password" name="senha" id="senha"
                                class="form-control" placeholder="Crie uma senha" autocomplete="new-password" required>
                        </div>

                        <div class="campo-cadastro">
                            <label for="tipo_conta">Tipo de conta</label>
                            <select name="tipo_conta" id="tipo_conta" class="form-select" required>
                                <option value="" selected disabled>Selecione o tipo de conta</option>
                                <option value="Usuário">Usuário</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>

                        <div class="campo-cadastro">
                            <label for="status">Status da conta</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="" selected disabled>Selecione o status</option>
                                <option value="Ativo">Ativo</option>
                                <option value="Inativo">Inativo</option>
                            </select>
                        </div>

                    </div>

                    <div class="cadastro-usuario-acoes">
                        <a href="usuario.php" class="botao-cadastro-voltar">
                            <i class="bi bi-arrow-left"></i>
                            Voltar
                        </a>

                        <button type="submit" class="botao-cadastro-salvar">
                            <i class="bi bi-person-check"></i>
                            Cadastrar usuário
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </main>

</body>
</html>
