<?php

require_once "../../../infra/conexao.php";

//funcionarios
$sqlTotal = "SELECT COUNT(*) AS total FROM usuario";
$resultadoTotal = $conn->query($sqlTotal);
$totalFuncionarios = $resultadoTotal->fetch_assoc()['total'];


//administradores
$sqlAdmins = "SELECT COUNT(*) AS total FROM usuario WHERE tipo_conta = 'Administrador'";
$resultadoAdmins = $conn->query($sqlAdmins);
$totalAdmins = $resultadoAdmins->fetch_assoc()['total'];

//usuarios
$sqlUsuarios = "SELECT COUNT(*) AS total FROM usuario WHERE tipo_conta = 'Usuário'";
$resultadoUsuarios = $conn->query($sqlUsuarios);
$totalUsuarios = $resultadoUsuarios->fetch_assoc()['total'];

//ativos
$sqlAtivos = "SELECT COUNT(*) AS total FROM usuario WHERE status = 'Ativo'";

$resultadoAtivos = $conn->query($sqlAtivos);

if (!$resultadoAtivos) {
    die("Erro na consulta: " . $conn->error);
}


$dadosAtivos = $resultadoAtivos->fetch_assoc();

$totalAtivos = $dadosAtivos['total'];


//lista de usuários
$sql = "SELECT * FROM usuario ORDER BY id_Usuario DESC";

$resultado = $conn->query($sql);

if (!$resultado) {
    die("Erro ao buscar usuários: " . $conn->error);
}



?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>XRail - Usuários</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"crossorigin="anonymous">
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

            <a href="../monitoramento_page/adm_monitoramento.php" class="menu-link">
                <i class="bi bi-graph-up"></i>
                <span>Monitoramento</span>
            </a>

            <a href="../relatorios_page/relatorios.php" class="menu-link">
                <i class="bi bi-file-earmark-text"></i>
                <span>Relatórios</span>
            </a>

            <a href="../usuario_page/usuario.php" class="menu-link active">
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
                        <img src="../../../assets/images/usuário.png"
                            class="img-fluid">

                        Administrador
                    </span>

                </div>

            </div>


            <h2 class="page-title">
                Adicionar Usuário / Administrador
            </h2>



            <div class="d-flex flex-wrap gap-3 mb-4">


                <div class="stat-card">

                    <span class="stat-icon purple">
                        <i class="bi bi-people-fill"></i>
                    </span>

                    <div>

                        <div class="stat-label">
                            Total de funcionários
                        </div>

                        <div class="stat-value">
                            <?= $totalFuncionarios ?>
                        </div>

                    </div>

                </div>



                <div class="stat-card">

                    <span class="stat-icon blue">
                        <i class="bi bi-person-gear"></i>
                    </span>

                    <div>

                        <div class="stat-label">
                            Administradores
                        </div>

                        <div class="stat-value">
                            <?= $totalAdmins ?>
                        </div>

                    </div>

                </div>



                <div class="stat-card">

                    <span class="stat-icon teal">
                        <i class="bi bi-person"></i>
                    </span>

                    <div>

                        <div class="stat-label">
                            Usuários
                        </div>

                        <div class="stat-value">
                            <?= $totalUsuarios ?>
                        </div>

                    </div>

                </div>



                <div class="stat-card">

                    <span class="stat-icon orange">
                        <i class="bi bi-person-check"></i>
                    </span>

                    <div>

                        <div class="stat-label">
                            Ativos
                        </div>

                        <div class="stat-value">
                            <?= $totalAtivos ?>
                        </div>

                    </div>

                </div>

            </div>




            <div class="d-flex flex-wrap gap-3 mb-3 align-items-center"> 
               

                <i class="bi bi-search"></i>

                <input type="text" id="busca" placeholder="Buscar por nome ou e-mail">

           
    
            <label>Tipo de conta</label>
           
                <select id="tipo" onchange="filtrarUsuarios()">

                    <option value="">Todos</option>

                    <option value="Administrador">Administrador</option>

                    <option value="Usuário"> Usuário </option>

                </select>

                
                <label>  Status </label>

                <select id="status" onchange="filtrarUsuarios()">

                    <option value=""> Todos </option>

                    <option value="Ativo">  Ativo</option>

                    <option value="Inativo"> Inativo </option>

                </select>





                <a href="adicionar_usuario.php"
                    class="btn-custom"
                    style="height:42px; white-space:nowrap; text-decoration:none;">

                    + Adicionar funcionário

                </a>

            </div>



            <div class="users-table-box">

                <table class="table mb-0">

                    <thead>

                        <tr>

                            <th>
                                ID
                            </th>

                            <th>
                                Nome
                            </th>

                            <th>
                                E-mail
                            </th>

                            <th>
                                Tipo de conta
                            </th>

                            <th>
                                Status
                            </th>

                            <th class="text-center">
                                Ações
                            </th>

                        </tr>

                    </thead>


                    <tbody id="listaUsuarios">


                        <?php
                        $sql = "SELECT * FROM usuario";
                        $resultado = mysqli_query($conn, $sql);

                        while ($usuario = mysqli_fetch_assoc($resultado)) {
                        ?>

                            <tr>
                                <td><?php echo $usuario["id_Usuario"]; ?></td>

                                <td><?php echo $usuario["nome"]; ?></td>

                                <td><?php echo $usuario["email"]; ?></td>

                                <td><?php echo $usuario["tipo_conta"]; ?></td>

                                <td><?php echo $usuario["status"]; ?></td>

                                <td class="text-center">

                                    <a class="botao_usuario" href="visualizar_usuario.php?id=<?php echo $usuario["id_Usuario"]; ?>">
                                        <button class="btn btn-primary">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </a>

                                    <a class="botao_usuario" href="editar_usuario.php?id=<?php echo $usuario["id_Usuario"]; ?>">
                                        <button class="btn btn-secondary">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    </a>

                                    <a class="botao_usuario" href="excluir_usuario.php?id=<?php echo $usuario["id_Usuario"]; ?>"
                                        onclick="return confirm('Tem certeza que deseja excluir este usuário?');">
                                        <button class="btn btn-danger">
                                            <i class="bi bi-person-dash"></i>
                                        </button>
                                    </a>

                                </td>

                            </tr>

                        <?php }
                         ?>
                </tbody>
            </div>
        </div>

        </div>

    </main>

     <script>
        const campoBusca = document.getElementById("busca");

        campoBusca.addEventListener("input", function () {
        filtrarUsuarios();
});
            function filtrarUsuarios() {
    const busca = document.getElementById("busca").value;
    const tipo = document.getElementById("tipo").value;
    const status = document.getElementById("status").value;

    fetch(
        "buscar_usuario.php?busca=" + encodeURIComponent(busca) +
        "&tipo=" + encodeURIComponent(tipo) +
        "&status=" + encodeURIComponent(status)
    )
    .then(response => response.text())
    .then(data => {
        listaUsuarios.innerHTML = data;
    })
    .catch(error => {
        console.error("Erro na filtragem:", error);
    });
}

   </script>
</body>

</html>