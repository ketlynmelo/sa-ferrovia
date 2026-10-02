<?php 

include "../../infra/conexao.php"; 

$busca = $_GET['busca'] ?? '';
$tipo = $_GET['tipo'] ?? ''; 
$status = $_GET['status'] ?? ''; 

$sql = "SELECT * FROM usuario WHERE 1=1";

if ($busca != '') {
    $sql .= " AND (nome LIKE '%$busca%' OR email LIKE '%$busca%')";
}

if ($tipo != '') {
    $sql .= " AND tipo_conta = '$tipo'";
}

if ($status != '') {
    $sql .= " AND status = '$status'";
}

$resultado = mysqli_query($conn, $sql); 

while ($usuario = mysqli_fetch_assoc($resultado)) { 
    echo " 
        <tr> 
            <td>{$usuario['id_Usuario']}</td> 
            <td>{$usuario['nome']}</td> 
            <td>{$usuario['email']}</td> 
            <td>{$usuario['tipo_conta']}</td> 
            <td>{$usuario['status']}</td> 
       <td>
                <a href='visualizar_usuario.php?id={$usuario['id_Usuario']}'>
                    <button>
                        <i class='bi bi-eye'></i>
                    </button>
                </a>

                <a href='editar_usuario.php?id={$usuario['id_Usuario']}'>
                    <button>
                        <i class='bi bi-pencil'></i>
                    </button>
                </a>

                <a href='excluir_usuario.php?id={$usuario['id_Usuario']}'
                   onclick=\"return confirm('Tem certeza que deseja excluir este usuário?');\">
                    <button>
                        <i class='bi bi-person-dash'></i>
                    </button>
                </a>
            </td>
        </tr>
    ";
}

?>