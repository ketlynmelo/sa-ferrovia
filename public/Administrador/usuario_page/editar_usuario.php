
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

           
            <a href="usuario.php" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>

            <br><br><br>

           <div class="rotas-header">
                    <div>
                        <h1>Editar Usuários</h1>
                        <p>Edite as informações dos usuários do sistema.</p>
                    </div>

                    <div class="user">
                        <span>
                            <img src="../../../../assets/images/usuário.png" class="img-fluid"> <?= htmlspecialchars($_SESSION['nome'] ?? 'Usuário') ?>
                        </span>
                    </div>

            </div>
               
            <hr>


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

                        
                        <div class="editar-campo">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control"
                                name="cep" id="cep" maxlength="9" required
                                value="<?= htmlspecialchars($row['cep'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                        </div>

                        <div class="editar-campo">
                            <label for="logradouro">Logradouro</label>
                            <input type="text" class="form-control"
                                name="logradouro" id="logradouro" required
                                value="<?= htmlspecialchars($row['logradouro'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                        </div>

                        <div class="campo-cadastro">
                            <label for="numero">Número</label>
                            <input
                                type="text"
                                name="numero"
                                id="numero"
                                class="form-control"
                                placeholder="Digite o número"
                                value="<?= htmlspecialchars($row['numero'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                required
                            >
                        </div>

                        <div class="editar-campo">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control"
                                name="bairro" id="bairro" required
                                value="<?= htmlspecialchars($row['bairro'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                        </div>

                        <div class="editar-campo">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control"
                                name="cidade" id="cidade" required
                                value="<?= htmlspecialchars($row['cidade'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                        </div>

                        <div class="editar-campo">
                            <label for="uf">Estado (UF)</label>

                            <input
                                type="text"
                                name="uf"
                                id="uf"
                                class="form-control"
                                placeholder="Digite ou selecione a UF"
                                list="estados"
                                maxlength="2"
                                pattern="[A-Za-z]{2}"
                                title="Digite uma sigla válida com duas letras"
                                style="text-transform: uppercase;"
                                value="<?= htmlspecialchars($row['uf'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                required
                            >

                            <datalist id="estados">
                                <option value="AC">
                                <option value="AL">
                                <option value="AP">
                                <option value="AM">
                                <option value="BA">
                                <option value="CE">
                                <option value="DF">
                                <option value="ES">
                                <option value="GO">
                                <option value="MA">
                                <option value="MT">
                                <option value="MS">
                                <option value="MG">
                                <option value="PA">
                                <option value="PB">
                                <option value="PR">
                                <option value="PE">
                                <option value="PI">
                                <option value="RJ">
                                <option value="RN">
                                <option value="RS">
                                <option value="RO">
                                <option value="RR">
                                <option value="SC">
                                <option value="SP">
                                <option value="SE">
                                <option value="TO">
                            </datalist>
                        </div>

                        <div class="editar-campo">
                            <label for="senha">Nova senha</label>
                            <input type="password" class="form-control" name="senha"id="senha"placeholder="Deixe vazio para manter a senha atual"autocomplete="new-password">
                            <small class="text-muted mt-1">Preencha somente se desejar alterar a senha.</small>
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

    <script>
    const campoCep = document.getElementById('cep');

    campoCep.addEventListener('input', function () {
        let valor = this.value.replace(/\D/g, '');
        valor = valor.replace(/^(\d{5})(\d)/, '$1-$2');
        this.value = valor;
    });

    campoCep.addEventListener('blur', consultarCep);

    async function consultarCep() {
        const cep = campoCep.value.replace(/\D/g, '');

        if (cep.length !== 8) {
            return;
        }

        try {
            campoCep.disabled = true;

            const resposta = await fetch(
                'consultar_cep.php?cep=' + encodeURIComponent(cep)
            );

            const dados = await resposta.json();

            if (!resposta.ok || dados.erro) {
                alert(dados.mensagem || 'Erro ao consultar CEP.');
                return;
            }

            document.getElementById('logradouro').value =
                dados.logradouro || '';

            document.getElementById('bairro').value =
                dados.bairro || '';

            document.getElementById('cidade').value =
                dados.cidade || '';

            document.getElementById('uf').value =
                dados.uf || '';

        } catch (erro) {
            alert('Não foi possível consultar o CEP.');
        } finally {
            campoCep.disabled = false;
        }
    }

    document.querySelector('form').addEventListener('submit', function () {
        const logradouro = document.getElementById('logradouro').value;
        const numero = document.getElementById('numero').value;
        const bairro = document.getElementById('bairro').value;
        const cidade = document.getElementById('cidade').value;
        const uf = document.getElementById('uf').value;
        const cep = campoCep.value;

        document.getElementById('endereco').value =
            `${logradouro}, ${numero}, ${bairro}, ${cidade} - ${uf}, CEP: ${cep}`;
    });

        const campoUF = document.getElementById('uf');

    campoUF.addEventListener('input', function () {
        this.value = this.value.toUpperCase();
    });

    </script>
</body>
</html>

