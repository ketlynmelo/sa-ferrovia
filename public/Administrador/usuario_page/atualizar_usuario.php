<?php
    include "../../../infra/conexao.php";

    $id_Usuario = $_POST['id_Usuario'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo_conta = $_POST['tipo_conta'];
    $status = $_POST['status'];

    $sql = "UPDATE usuario 
    SET nome='$nome', 
    cpf='$cpf',
    data_nascimento='$data_nascimento', 
    email='$email', senha='$senha', 
    tipo_conta='$tipo_conta', 
    status='$status' 
    WHERE id_Usuario=$id_Usuario";

    if(mysqli_query($conn, $sql)) {
        echo "Usuário atualizado com sucesso.";
        header("Location: usuario.php");
    } else {
        echo "Erro ao atualizar usuário: " . mysqli_error($conn);
    }
?>