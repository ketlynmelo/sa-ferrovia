<?php
session_start();

include "infra/conexao.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuario WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Erro no prepare: " . $conn->error);
    }
    $stmt->bind_param("s", $email);
    if (!$stmt->execute()) {
        die("Erro no execute: " . $stmt->error);
    }
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        if (password_verify($senha, $usuario['senha'])) {
            echo "Senha correta!<br>";
            $_SESSION['id_Usuario'] = $usuario['id_Usuario'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['tipo_conta'] = $usuario['tipo_conta'];
            header("Location: public/Administrador/home_page/adm_home.php");
            exit;
        } else {
            echo "Senha INCORRETA!<br>";
        }
    } else {
        echo "E-mail não encontrado!<br>";
    }
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>XRail</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="style/style.css">

</head>

<body id="login">
  <main class="dividido">

    <div>

      <img id="logo" src="assets/images/tela.png" alt="Logo">

    </div>


    <div id="colorir" class="container rounded-5 shadow p-3 mb-2 text-dark"
      style="margin-top: 50px; max-width: 600px; margin-top: 250px; margin-right: 400px;">

      <form id="formulario" method="POST" class="row g-3 needs-validation" >

        <div style="margin-top: 50px;">
          <h2 class="text-center "> <b>LOGIN</b></h2>
        </div>


        <div class="col-md-12">
          <label for="usuario" id="branco" class="form-label">Usuário</label>
          <input type="email" class="form-control" id="usuario" name="email" required>
          <div id="erro-usuario" class="erro"></div>
        </div>



        <div class="col-md-12">
          <label for="senha" id="branco" class="form-label">Senha</label>
          <input type="password" class="form-control" id="senha" name="senha" required>
          <div id="erro-senha" class="erro"></div>
        </div>


        <div id="mensagem"></div>
        <div class="toggle" id="toggle">
          <p>Não tem conta? Solicite!</p>
        </div>


        <div class="col-12" style="text-align: center;">
          <button class="btn btn-primary" type="submit">Entrar</button>
        </div>

      </form>

    </div>

  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
  <script src="script/script.js"></script>
</body>



</html>