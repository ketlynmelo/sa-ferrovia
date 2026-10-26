
<?php

require_once __DIR__ . '/../../../../infra/conexao.php';

$pagina = 'visualizar_trem.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = filter_input(INPUT_POST, 'id_Trem', FILTER_VALIDATE_INT);
    $nome = trim($_POST['nome_trem'] ?? '');
    $modelo = trim($_POST['modelo'] ?? '');
    $carga = $_POST['carga'] ?? '';
    $velocidade = filter_input(
        INPUT_POST,
        'velocidade',
        FILTER_VALIDATE_INT
    );
    $usuario = filter_input(
        INPUT_POST,
        'Usuario_id_Usuario',
        FILTER_VALIDATE_INT
    );

    $cargasValidas = [
        'Passageiros',
        'Carga Geral',
        'Minério',
        'Combustível'
    ];

    if (
        !$id || $nome === '' || $modelo === '' ||
        !in_array($carga, $cargasValidas, true) ||
        $velocidade === false || $velocidade === null ||
        $velocidade < 0 || !$usuario
    ) {
        header("Location: $pagina?mensagem=erro");
        exit;
    }

    $sql = "UPDATE trem
            SET nome_trem = ?, modelo = ?, carga = ?,
                velocidade = ?, Usuario_id_Usuario = ?
            WHERE id_Trem = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        header("Location: $pagina?mensagem=erro");
        exit;
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sssiii",
        $nome,
        $modelo,
        $carga,
        $velocidade,
        $usuario,
        $id
    );

    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    

    if ($ok) {
        header("Location: $pagina?mensagem=atualizado");
    } else {
        header("Location: $pagina?mensagem=erro");
    }

    exit;
}

$id = filter_input(INPUT_GET, 'id_Trem', FILTER_VALIDATE_INT);

if (!$id || $id <= 0) {
    header("Location: $pagina?mensagem=erro");
    exit;
}

$stmt = mysqli_prepare(
    $conn,
    "SELECT * FROM trem WHERE id_Trem = ?"
);

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);
$trem = mysqli_fetch_assoc($resultado);

mysqli_stmt_close($stmt);

if (!$trem) {
    header("Location: $pagina?mensagem=erro");
    exit;
}

$resultadoUsuarios = mysqli_query(
    $conn,
    "SELECT id_Usuario, nome FROM usuario ORDER BY nome"
);

?>

<!DOCTYPE html>
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

            <a href="../../home_page/adm_home.php/sensor/cadastro_sensor.php" class="menu-link active">
                <i class="bi bi-house-fill"></i>
                <span>Início</span>
            </a>


            <a href="../../home_page/rotas/cadastro_rotas.php" class="menu-link">
                <i class="bi bi-train-freight-front"></i>
                <span>Rotas</span>
            </a>

            <a href="../../home_page/usuarios/usuario.php" class="menu-link ">
                <i class="bi bi-people"></i>
                <span>Usuários</span>
            </a>


            <a href="../../home_page/relatorios/relatorios.php" class="menu-link">
                <i class="bi bi-file-earmark-text"></i>
                <span>Relatórios</span>
            </a>

            <a href="../../logout.php" class="menu-link">
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

                <h2>Editando o trem!</h2>
            
                    <form action="cadastro_trem.php" method="POST" class="row g-3">

                    <div class="col-12"> 
                        <input type="hidden" name="id_Trem" class="form-control" id="id_Trem"
                            value="<?= (int) $trem['id_Trem'] ?>">
                    </div>

                    <div class="col-12">
                        <label for="nome_trem" class="form-label">Nome do trem</label>
                        <input type="text" class="form-control" id="nome_trem" name="nome_trem"
                            value="<?= htmlspecialchars($trem['nome_trem']) ?>"
                            required>
                    </div>

                    <div class="col-12">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" class="form-control" id="modelo" name="modelo"
                            value="<?= htmlspecialchars($trem['modelo']) ?>"
                            required>
                    </div>

                    <div class="col-12">
                        <label for="carga" class="form-label">Carga</label>
                        <select class="form-control" id="carga" name="carga" required>
                            <?php foreach ([
                                'Passageiros', 'Carga Geral', 'Minério', 'Combustível'
                            ] as $opcao) { ?>
                                <option value="<?= htmlspecialchars($opcao) ?>"
                                    <?= $trem['carga'] === $opcao ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($opcao) ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="velocidade" class="form-label">Velocidade</label>
                        <input type="number" class="form-control"id="velocidade" name="velocidade"
                            value="<?= htmlspecialchars($trem['velocidade']) ?>"
                            min="0" required>
                    </div>

                    <div class="col-12">
                        <label for="Usuario_id_Usuario" class="form-label">Usuário</label>
                        <select class="form-control" id="Usuario_id_Usuario" name="Usuario_id_Usuario" required>
                            <option value="">Selecione um usuário</option>

                            <?php while ($usuario = mysqli_fetch_assoc($resultadoUsuarios)) { ?>
                                <option value="<?= (int) $usuario['id_Usuario'] ?>"
                                    <?= (int) $trem['Usuario_id_Usuario'] === (int) $usuario['id_Usuario']
                                        ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($usuario['nome']) ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Atualizar trem</button>
                    </div>

                </form>

            </div>

        </div>
    </main>
</body>
</html>