<?php
  $erro = isset($_GET["erro"]);
if (isset($_SESSION["usuario_id"])) {

    if ($_SESSION["tipo"] === "Administrador") {
        header("Location: public/Administrador/home_page/adm_home.php");
        exit;
    }

    if ($_SESSION["tipo"] === "Usuário") {
        header("Location: public/Usuário/home_page/usuario_home.php");
        exit;
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

      <form id="formulario" action="login.php" method="POST" class="row g-3 needs-validation" >

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

      <?php if ($erro) { ?>
    <div class="alert alert-danger mt-3">
        E-mail ou senha incorretos, ou conta inativa.
    </div>
<?php } ?>



    </div>

  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
  <script src="script/script.js"></script>
</body>



</html>