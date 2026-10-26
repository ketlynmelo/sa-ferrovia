<?php

require_once __DIR__ . '/../../../../infra/conexao.php';

$sqlSensores = "SELECT id_Sensor, nome_sensor FROM sensor";
$resultadoSensores = mysqli_query($conn, $sqlSensores);

$sqlUsuarios = "SELECT id_Usuario, nome FROM usuario";
$resultadoUsuarios = mysqli_query($conn, $sqlUsuarios);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome_trem'];
    $modelo = $_POST['modelo'];
    $carga = $_POST['carga'];
    $velocidade = (int) $_POST['velocidade'];
    $usuario = (int) $_POST['Usuario_id_Usuario'];

    $sql = "INSERT INTO trem
            (nome_trem, modelo, carga, velocidade, Usuario_id_Usuario)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssii", $nome, $modelo, $carga, $velocidade, $usuario);

        if (mysqli_stmt_execute($stmt)) {
         header("Location: visualizar_trem.php?mensagem=cadastrado");
        exit;
        } else {
            echo "Erro ao cadastrar: " .
                 htmlspecialchars(mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erro ao preparar a consulta.";
    }
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

            <a href="../../home_page/adm_home.php/trem/cadastro_trem.php" class="menu-link active">
                <i class="bi bi-house-fill"></i>
                <span>Início</span>
            </a>
            
            <a href="../../home_page/rotas/cadastro_rotas.php" class="menu-link">
                <i class="bi bi-train-freight-front"></i>
                <span>Rotas</span>
            </a>


            <a href="../../home_page/monitoramento_page/adm_monitoramento.php" class="menu-link">
                <i class="bi bi-graph-up"></i>
                <span>Monitoramento</span>
            </a>

            <a href="../../home_page/relatorios_page/relatorios.php" class="menu-link">
                <i class="bi bi-file-earmark-text"></i>
                <span>Relatórios</span>
            </a>

            <a href="../../home_page/usuarios/usuario.php" class="menu-link">
                <i class="bi bi-people"></i>
                <span>Usuários</span>
            </a>

            <a href="../../home_page/logout.php" class="menu-link">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
            </a>

        </nav>

    </aside>

    <main class="main">

        <div class="container-fluid">

            <a href="../adm_home.php" class="btn btn-outline-secondary mb-3">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>


            <div class="form-card" id="cadastrarTrem">

                    <div class="page-title">Cadastrar Trens</div>

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
                            <label for="ct_carga" class="form-label">Usuário</label>
                            <select class="form-select" id="ct_trem" name="Usuario_id_Usuario" required>

                                <option value="" selected disabled>
                                    Selecione um usuário
                                </option>

                                <?php
                                    $sqlUsuarios = "SELECT id_Usuario, nome FROM usuario";
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