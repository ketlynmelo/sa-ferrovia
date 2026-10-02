 <?php
    include "../../infra/conexao.php";
    ?>

<h1>Cadastro de Usuários</h1>
<link rel="stylesheet" href="../style/style.css">



<form action="cadastrar_usuario.php" method="POST" >


    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required>

    <br><br>

    <label for="cpf">CPF:</label>
    <input type="text" name="cpf" id="cpf" required>

    <br><br>

    <label for="data_nascimento">Data de Nascimento:</label>
    <input type="date" name="data_nascimento" id="data_nascimento" required>

    <br><br>

    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" required>

    <br><br>

    <label for="endereco">Endereço:</label>
    <input type="text" name="endereco" id="endereco" required>

    <br><br>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" required>

    <br><br>

    <label for="tipo_conta">Tipo de Conta:</label>
    <select name="tipo_conta" id="tipo_conta" required>
        <option value="">Selecione o tipo de conta</option>
        <option value="Administrador">Administrador</option>
        <option value="Usuário">Usuário</option>
    </select>

    <br><br>

    <label for="status">Status:</label>
    <select name="status" id="status" required>
        <option value="">Selecione o status</option>
        <option value="Ativo">Ativo</option>
        <option value="Inativo">Inativo</option>
    </select>

    <br><br>

    <button type="submit">Cadastrar</button>

</form>
