
<?php
include "../../../../infra/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_Rota = (int) $_POST['id_Rota'];
    $nome_rota = trim($_POST['nome_rota']);
    $horario_rota = $_POST['horario_rota'];
    $ponto_inicial = trim($_POST['ponto_inicial']);
    $ponto_final = trim($_POST['ponto_final']);
    $distancia = $_POST['distancia'];
    $trem_id = (int) $_POST['trem_id'];

    $sql = "UPDATE rota SET
                nome_rota = ?,
                horario_rota = ?,
                ponto_inicial = ?,
                ponto_final = ?,
                distancia = ?,
                trem_id = ?
            WHERE id_Rota = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssssdii",
        $nome_rota,
        $horario_rota,
        $ponto_inicial,
        $ponto_final,
        $distancia,
        $trem_id,
        $id_Rota
    );

    if ($stmt->execute()) {
        header("Location: cadastro_rotas.php?mensagem=atualizado");
        exit;
    } else {
        echo "Erro ao atualizar rota: " . $stmt->error;
    }

    $stmt->close();
}
?>