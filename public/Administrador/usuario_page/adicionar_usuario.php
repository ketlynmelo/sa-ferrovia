
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

                     
                        <div class="campo-cadastro">
                            <label for="cep">CEP</label>
                            <input type="text" name="cep" id="cep"
                                class="form-control" placeholder="00000-000"
                                maxlength="9" required>
                        </div>

                        <div class="campo-cadastro">
                            <label for="logradouro">Logradouro</label>
                            <input type="text" name="logradouro" id="logradouro"
                                class="form-control" placeholder="Rua, avenida..."
                                required>
                        </div>

                        <div class="campo-cadastro">
                            <label for="numero">Número</label>
                            <input type="number" name="numero" id="numero"
                                class="form-control" placeholder="Número da residência"
                                required>

                        </div>

                        <div class="campo-cadastro">
                            <label for="bairro">Bairro</label>
                            <input type="text" name="bairro" id="bairro"
                                class="form-control" placeholder="Bairro"
                                required>
                        </div>

                        <div class="campo-cadastro">
                            <label for="cidade">Cidade</label>
                            <input type="text" name="cidade" id="cidade"
                                class="form-control" placeholder="Município"
                                required>
                        </div>

                       
                        <div class="campo-cadastro">
                            <label for="uf">Estado (UF)</label>

                            <input type="text" name="uf" id="uf" class="form-control" placeholder="Digite ou selecione a UF"
                                list="estados" maxlength="2" pattern="[A-Za-z]{2}" title="Digite uma sigla válida com duas letras"
                                style="text-transform: uppercase;" required
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
                    <a href="usuario.php" class="btn-editar-voltar">
                <i class="bi bi-arrow-left"></i> Voltar
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
            alert('Não foi possível consultar o CEP. Verifique sua conexão.');
        } finally {
            campoCep.disabled = false;
        }
    }

    document.querySelector('form').addEventListener('submit', function () {
        const logradouro = document.getElementById('logradouro').value;
        const bairro = document.getElementById('bairro').value;
        const cidade = document.getElementById('cidade').value;
        const uf = document.getElementById('uf').value;
        const cep = campoCep.value;

        document.getElementById('endereco').value =
            `${logradouro}, ${bairro}, ${cidade} - ${uf}, CEP: ${cep}`;
    });

        const campoUF = document.getElementById('uf');

    campoUF.addEventListener('input', function () {
        this.value = this.value.toUpperCase();
    });

    </script>

</body>
</html>
