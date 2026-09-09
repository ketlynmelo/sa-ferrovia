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

            <div class="header">

                
                </div>

            </div>

        </div>






    <main style="display: flex;  min-height: 100vh;">

        <div class="conteudo">


            <form id="cadastro" class="row gy-2 gx-3 needs-validation" novalidate>

                <div style="margin-top: 50px;">
                    <h2 class="text-center ">Cadastro de usuário</h2>
                    <p style="text-align: center;"> Preencha as informações abaixo para cadastrar um novo usuário ou
                        administrador</p>
                </div>

                <div class="col-md-6">
                    <label for="nome" class="form-label">Nome completo </label>
                    <input type="text" class="form-control" id="nome" required>
                    <div class="invalid-feedback"> Informe o nome</div>
                </div>


                <div class="col-md-6">

                    <label for="email" class="form-label"> Email</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text">
                            @
                        </span>

                        <input type="text" class="form-control" id="email" required>

                        <div class="invalid-feedback"> Informe um email válido.</div>

                    </div>
                </div>


                <div class="col-md-6">
                    <label for="senha" class="form-label"> Senha </label>
                    <input type="password" class="form-control" id="senha" required>

                    <div class="invalid-feedback"> A senha deve ter pelo menos 6 caracteres. </div>

                </div>


                <div class="col-md-6">
                    <label for="confirmarSenha" class="form-label"> Confirmar Senha</label>
                    <input type="password" class="form-control" id="confirmarSenha" required>

                    <div class="invalid-feedback">As senhas não coincidem.</div>

                </div>


                <div class="col-md-4">
                    <label for="status" class="form-label">
                        Status
                    </label>

                    <select class="form-select" id="status" required>
                        <option value="" selected>
                            Status
                        </option>
                        <option value="ativo">
                            Ativo
                        </option>
                        <option value="inativo">
                            Inativo
                        </option>

                    </select>

                    <div class="invalid-feedback">Selecione um status.</div>

                </div>


                <div class="col-md-4">

                    <label for="telefone" class="form-label">Telefone </label>

                    <input type="text" class="form-control" id="telefone" required>

                    <div class="invalid-feedback">
                        Informe o telefone.
                    </div>
                </div>

                <div class="col-md-4">

                    <label for="cpf" class="form-label">CPF</label>

                    <input type="text" class="form-control" id="cpf" required>

                    <div class="invalid-feedback">Informe um CPF válido.</div>

                </div>


                <div id="permissao" class="d-flex gap-4 mt-3">
                    <div class="borda form-check">
                        <input class="form-check-input" type="radio" name="permissao" id="admin" value="admin">
                        <i class="bi bi-gear-wide-connected"></i>
                        <label class="form-check-label" for="admin">
                            Administrador
                        </label>
                    </div>

                    <div class="borda form-check">
                        <input class="form-check-input" type="radio" name="permissao" id="usuario" value="usuario">
                        <i class="bi bi-person"></i>
                        <label class="form-check-label" for="usuario"> Usuário</label>
                    </div>

                </div>

                <div id="erroPermissao" class="text-danger mt-2"></div>
                <div class="d-flex justify-content-end gap-2 mt-4">

                    <button type="button" class="btn btn-secondary"> Cancelar </button>
                    <button class="btn btn-primary" type="submit"> Salvar</button>

                </div>

            </form>
        </div>

    </main>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
<script src="scriptCadastro.js"></script>

</html>