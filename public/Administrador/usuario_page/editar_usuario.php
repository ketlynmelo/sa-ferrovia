<?php
    include "../../../infra/conexao.php";
    include "../../../infra/verificar_adm.php";
    ?>

<h1>Editar Usuário</h1>
<link rel="stylesheet" href="../style/style.css">

<?php
    $id_Usuario = $_GET['id'];
    $sql = "SELECT * FROM usuario WHERE id_Usuario = $id_Usuario";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>

<form action="atualizar_usuario.php" method="POST" >

    <input type="hidden" name="id_Usuario" value="<?php echo $row['id_Usuario']; ?>">

    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" value="<?php echo $row['nome']; ?>" required>

    <br><br>

    <label for="cpf">CPF:</label>
    <input type="text" name="cpf" id="cpf" value="<?php echo $row['cpf']; ?>" required>

    <br><br>

    <label for="data_nascimento">Data de Nascimento:</label>
    <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $row['data_nascimento']; ?>" required>

    <br><br>
    
    <label for="endereco">Endereço:</label>
    <input type="text" name="endereco" id="endereco" value="<?php echo $row['endereco']; ?>" required>

    <br><br>

    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" required>

    <br><br>


    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" required placeholder="Digite a nova senha">

    <br><br>

    <label for="tipo_conta">Tipo de Conta:</label>
    <select name="tipo_conta" id="tipo_conta" required>
        <option value="">Selecione o tipo de conta</option>
        <option value="Administrador" <?php if($row['tipo_conta'] == 'Administrador') echo 'selected'; ?>>Administrador</option>
        <option value="Usuário" <?php if($row['tipo_conta'] == 'Usuário') echo 'selected'; ?>>Usuário</option>
    </select>

    <br><br>

    <label for="status">Status:</label>
    <select name="status" id="status" required>
        <option value="">Selecione o status</option>
        <option value="Ativo" <?php if($row['status'] == 'Ativo') echo 'selected'; ?>>Ativo</option>
        <option value="Inativo" <?php if($row['status'] == 'Inativo') echo 'selected'; ?>>Inativo</option>
    </select>

    <br><br>

    <button type="submit">Atualizar</button>
    <button type="button" onclick="window.location.href='usuario.php'">Voltar</button>

</form>