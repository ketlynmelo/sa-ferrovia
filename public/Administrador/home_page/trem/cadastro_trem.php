
<?php

require_once __DIR__ . '/../../../../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome_trem'] ?? '');
    $modelo = trim($_POST['modelo'] ?? '');
    $carga = trim($_POST['carga'] ?? '');
    $velocidade = filter_input(INPUT_POST, 'velocidade', FILTER_VALIDATE_INT);

    $usuario = filter_input(
        INPUT_POST,
        'Usuario_id_Usuario',
        FILTER_VALIDATE_INT
    );

    if (
        $nome === '' ||
        $modelo === '' ||
        $carga === '' ||
        $velocidade === false ||
        $velocidade === null ||
        $velocidade < 0 ||
        !$usuario
    ) {
        die('Preencha todos os campos corretamente.');
    }

    $sql = "INSERT INTO trem
            (nome_trem, modelo, carga, velocidade, Usuario_id_Usuario)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die('Erro ao preparar o cadastro: ' .
            htmlspecialchars(mysqli_error($conn)));
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sssii",
        $nome,
        $modelo,
        $carga,
        $velocidade,
        $usuario
    );

    if (mysqli_stmt_execute($stmt)) {

        mysqli_stmt_close($stmt);

        header("Location: visualizar_trem.php?mensagem=cadastrado");
        exit;
    }

    $erro = mysqli_stmt_error($stmt);

    mysqli_stmt_close($stmt);

    die('Erro ao cadastrar o trem: ' . htmlspecialchars($erro));
}
?>


<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XRail</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../../../../style/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>


    <aside class="sidebar">

        <div class="text-center mb-5">
            <img src="../../../../assets/images/Simbolo.png" class="logo">
        </div>

        <nav class="d-flex flex-column">

            <a href="../adm_home.php" class="menu-link active">
                <i class="bi bi-house-fill"></i>
                <span>Início</span>
            </a>
            
            <a href="../../home_page/rotas/cadastro_rotas.php" class="menu-link">
                <i class="bi bi-train-freight-front"></i>
                <span>Rotas</span>
            </a>


            <a href="../../monitoramento_page/adm_monitoramento.php" class="menu-link">
                <i class="bi bi-graph-up"></i>
                <span>Monitoramento</span>
            </a>

            <a href="../../usuario_page/usuario.php" class="menu-link">
                <i class="bi bi-people"></i>
                <span>Usuários</span>
            </a>

            <a href="../../../../logout.php" class="menu-link">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
            </a>

        </nav>

    </aside>

    <main class="main">

        <div class="container-fluid">

        <a href="../../home_page/adm_home.php" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>

        <br><br><br>
            
           <div class="rotas-header">
                    <div>
                        <h1>Cadastrar Trens</h1>
                        <p>Cadastre novos trens no sistema.</p>
                    </div>

                    <div class="user">
                        <span>
                            <img src="../../../../assets/images/usuário.png" class="img-fluid"> <?= htmlspecialchars($_SESSION['nome'] ?? 'Usuário') ?>
                        </span>
                    </div>

            </div>
               
            <hr>


            <div class="editar-rota-card">

                <div class="editar-rota-header">
                    <div class="editar-rota-icone">
                        <i class="bi bi-train-freight-front"></i>
                    </div>
                    <h8>Novo trem</h8>
                </div>

                    <form action="cadastro_trem.php" method="POST" class="row g-3">
                        
                        <div class="col-12">
                            <label for="ct_nome" class="form-label">Nome do Trem</label>
                            <input type="text" class="form-control"
                                id="ct_nome" name="nome_trem"
                                placeholder="ex: Stiles" required>
                        </div>

                        <div class="col-12">
                            <label for="ct_modelo" class="form-label">Modelo</label>
                            <input type="text" class="form-control"
                                id="ct_modelo" name="modelo"
                                placeholder="ex: 2023" required>
                        </div>

                        <div class="col-12">
                            <label for="ct_carga" class="form-label">Carga</label>
                            <select class="form-select" id="ct_carga"
                                    name="carga" required>
                                <option value="" selected disabled>
                                    Selecione o tipo de carga
                                </option>
                                <option value="Passageiros">Passageiros</option>
                                <option value="Carga Geral">Carga Geral</option>
                                <option value="Minério">Minério</option>
                                <option value="Combustível">Combustível</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="ct_velocidade" class="form-label">Velocidade</label>
                            <input type="number" class="form-control"
                                id="ct_velocidade" name="velocidade"
                                required>
                        </div>

                        <div class="col-12">
                            <label for="Usuario_id_Usuario" class="form-label">Usuário</label>
                            <select class="form-select" id="Usuario_id_Usuario" name="Usuario_id_Usuario" required>

                                <option value="" selected disabled>
                                    Selecione um usuário
                                </option>

                                <?php
                                    $sqlUsuarios = "SELECT id_Usuario, nome FROM usuario ORDER BY nome";
                                    $resultadoUsuarios = mysqli_query($conn, $sqlUsuarios);

                                    while ($usuario = mysqli_fetch_assoc($resultadoUsuarios)) {
                                        echo '<option value="' . $usuario['id_Usuario'] . '">' . htmlspecialchars($usuario['nome']) . '</option>';
                                    }
                                ?>

                            </select>
                        </div>

                        <div class="col-12 d-flex gap-2 mt-3">
                            <a href="../adm_home.php" class="btn btn-cancelar">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-salvar">
                                Salvar Trem
                            </button>
                        </div>

                    </form>

            </div>

        </div>

    </main>

</body>

</html>