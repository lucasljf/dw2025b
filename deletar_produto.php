<?php
    require_once "conexao.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM tb_produto WHERE id_produto = ?";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, "i", $id);

    mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);

    header("Location: lista_produtos.php");
?>