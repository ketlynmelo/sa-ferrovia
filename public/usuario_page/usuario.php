<html lang="pt-BR">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XRail - Usuários</title>
 
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
            <a href="../public/home.html" class="menu-link">
                <i class="bi bi-house-fill"></i>
                <span>Início</span>
            </a>
            <a href="../public/monitoramento.html" class="menu-link">
                <i class="bi bi-graph-up"></i>
                <span>Monitoramento</span>
            </a>
            <a href="../public/relatorios.html" class="menu-link">
                <i class="bi bi-file-earmark-text"></i>
                <span>Relatórios</span>
            </a>
            <a href="../public/usuario.html" class="menu-link active">
                <i class="bi bi-people"></i>
                <span>Usuários</span>
            </a>
            <a href="../public/login.html" class="menu-link">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
            </a>
        </nav>
    </aside>
 
    <main class="main">
        <div class="container-fluid">
 
            <!-- Header -->
            <div class="header">
                <div></div>
                <div class="user">
                    <span>
                        <img src="../assets/images/usuário.png" class="img-fluid"> Administrador
                    </span>
                </div>
            </div>
 
            <h2 class="page-title">Adicionar Usuário / Administrador</h2>
 
            <!-- Stat cards -->
            <div class="d-flex flex-wrap gap-3 mb-4">
                <div class="stat-card">
                    <span class="stat-icon purple"><i class="bi bi-people-fill"></i></span>
                    <div>
                        <div class="stat-label">Total de funcionários</div>
                        <div class="stat-value" id="totalFuncionarios">0</div>
                    </div>
                </div>
                <div class="stat-card">
                    <span class="stat-icon blue"><i class="bi bi-person-gear"></i></span>
                    <div>
                        <div class="stat-label">Administradores</div>
                        <div class="stat-value" id="totalAdmins">0</div>
                    </div>
                </div>
                <div class="stat-card">
                    <span class="stat-icon teal"><i class="bi bi-person"></i></span>
                    <div>
                        <div class="stat-label">Usuários</div>
                        <div class="stat-value" id="totalUsuarios">0</div>
                    </div>
                </div>
                <div class="stat-card">
                    <span class="stat-icon orange"><i class="bi bi-person-check"></i></span>
                    <div>
                        <div class="stat-label">Ativos</div>
                        <div class="stat-value" id="totalAtivos">0</div>
                    </div>
                </div>
            </div>
 
            <!-- Toolbar -->
            <div class="toolbar">
                <div class="search-wrap">
                    <i class="bi bi-search"></i>
                    <input type="text" id="searchInput" placeholder="Buscar por nome ou e-mail">
                </div>
 
                <div class="filter-group">
                    <label>Tipo de conta</label>
                    <select id="filterTipo">
                        <option value="">Todos</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Usuário">Usuário</option>
                    </select>
                </div>
 
                <div class="filter-group">
                    <label>Status</label>
                    <select id="filterStatus">
                        <option value="">Todos</option>
                        <option value="Ativo">Ativo</option>
                        <option value="Inativo">Inativo</option>
                    </select>
                </div>
 
                <button class="btn-custom" style="height:42px; white-space:nowrap;" onclick="abrirModalAdicionar()">
                    + Adicionar funcionário
                </button>
            </div>
 
            <!-- Tabela -->
            <div class="users-table-box">
                <table class="table mb-0" id="tabelaUsuarios">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Tipo de conta</th>
                            <th>Status</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="corpoTabela">
                        <!-- preenchido via JS -->
                    </tbody>
                </table>
            </div>
 
        </div>
    </main>
 
    <!-- ── Modal: Adicionar / Editar ── -->
    <div class="modal-overlay" id="modalForm">
        <div class="modal-box">
            <button class="modal-close" onclick="fecharModal('modalForm')">&times;</button>
            <h5 id="modalFormTitulo">Adicionar Funcionário</h5>
            <form id="formUsuario" novalidate>
                <input type="hidden" id="editIndex" value="">
                <div class="mb-3">
                    <label class="form-label">Nome completo</label>
                    <input type="text" class="form-control" id="fNome" required>
                    <div class="invalid-feedback">Informe o nome.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="fEmail" required>
                    <div class="invalid-feedback">Informe um e-mail válido.</div>
                </div>
                <div class="row g-2 mb-3">
                    <div class="col-6">
                        <label class="form-label">Tipo de conta</label>
                        <select class="form-select" id="fTipo" required>
                            <option value="">Selecione</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Usuário">Usuário</option>
                        </select>
                        <div class="invalid-feedback">Selecione o tipo.</div>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Status</label>
                        <select class="form-select" id="fStatus" required>
                            <option value="">Selecione</option>
                            <option value="Ativo">Ativo</option>
                            <option value="Inativo">Inativo</option>
                        </select>
                        <div class="invalid-feedback">Selecione o status.</div>
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-secondary" onclick="fecharModal('modalForm')">Cancelar</button>
                    <button type="submit" class="btn-custom btn">Salvar</button>
                </div>
            </form>
        </div>
    </div>
 
    <!-- ── Modal: Visualizar ── -->
    <div class="modal-overlay" id="modalView">
        <div class="modal-box">
            <button class="modal-close" onclick="fecharModal('modalView')">&times;</button>
            <h5>Detalhes do Funcionário</h5>
            <table class="table table-borderless">
                <tbody id="viewBody"></tbody>
            </table>
        </div>
    </div>
 
    <!-- ── Modal: Confirmar exclusão ── -->
    <div class="modal-overlay" id="modalDelete">
        <div class="modal-box" style="max-width:380px; text-align:center;">
            <button class="modal-close" onclick="fecharModal('modalDelete')">&times;</button>
            <i class="bi bi-exclamation-triangle-fill text-danger" style="font-size:3rem;"></i>
            <h5 class="mt-3">Confirmar exclusão</h5>
            <p class="text-muted">Tem certeza que deseja remover <strong id="deleteNome"></strong>?</p>
            <div class="d-flex justify-content-center gap-3 mt-3">
                <button class="btn btn-secondary" onclick="fecharModal('modalDelete')">Cancelar</button>
                <button class="btn btn-danger" id="btnConfirmarDelete">Excluir</button>
            </div>
        </div>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../script/script_usuario.js"></script>
</body>
 
</html>
