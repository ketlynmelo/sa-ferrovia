
<?php

require_once __DIR__ . '/../../../../infra/conexao.php';

$pagina = 'visualizar_trem.php';

if (
    !isset($_GET['id_Trem']) ||
    !ctype_digit((string) $_GET['id_Trem']) ||
    (int) $_GET['id_Trem'] <= 0
) {
    header("Location: $pagina?mensagem=erro");
    exit;
}

$id = (int) $_GET['id_Trem'];

try {
    $stmt = mysqli_prepare(
        $conn,
        "DELETE FROM trem WHERE id_Trem = ?"
    );

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $excluido = mysqli_stmt_affected_rows($stmt) === 1;

    mysqli_stmt_close($stmt);

    header(
        "Location: $pagina?mensagem=" .
        ($excluido ? "excluido" : "erro")
    );
    exit;

} catch (mysqli_sql_exception $e) {
    if (isset($stmt) && $stmt instanceof mysqli_stmt) {
        mysqli_stmt_close($stmt);
    }

    if ((int) $e->getCode() === 1451) {
        header("Location: $pagina?mensagem=vinculado");
    } else {
        error_log($e->getMessage());
        header("Location: $pagina?mensagem=erro");
    }

    exit;
}
