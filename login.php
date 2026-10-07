<?php

session_start();

require_once "infra/conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$query = "SELECT * FROM usuario WHERE email = ? AND status = 'Ativo'";

$comando = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param($comando, "s", $email);

mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);

if (mysqli_num_rows($resultado) > 0) {

    $usuario = mysqli_fetch_assoc($resultado);

    if ($senha == $usuario['senha']) {

        $_SESSION['id_usuario'] = $usuario['id_Usuario'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['tipo'] = $usuario['tipo_conta'];

        if ($usuario['tipo_conta'] == 'Administrador') {

            header("Location: public/Administrador/home_page/home.php");
            exit();

        } elseif ($usuario['tipo_conta'] == 'Usuário') {

            header("Location: public/Usuário/home_page/home.php");
            exit();

        }

    } else {

        echo "Senha incorreta.";

    }

} else {

    echo "E-mail não encontrado ou usuário inativo.";

}

?>
<?php

session_start();

require_once "infra/conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$query = "SELECT * FROM usuario WHERE email = ? AND status = 'Ativo'";

$comando = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param($comando, "s", $email);

mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);

if (mysqli_num_rows($resultado) > 0) {

    $usuario = mysqli_fetch_assoc($resultado);

    if ($senha == $usuario['senha']) {

        $_SESSION['id_usuario'] = $usuario['id_Usuario'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['tipo'] = $usuario['tipo_conta'];

        if ($usuario['tipo_conta'] == 'Administrador') {

            header("Location: public/Administrador/home_page/adm_home.php");
            exit();

        } elseif ($usuario['tipo_conta'] == 'Usuário') {

            header("Location: public/Usuário/home_page/usuario_home.php");
            exit();

        }

    } else {

        echo "Senha incorreta.";

    }

} else {

    echo "E-mail não encontrado ou usuário inativo.";

}

?>