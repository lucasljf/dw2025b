<?php
    require_once "conexao.php";

    $nome = $_GET['nome'];
    $endereco = $_GET['endereco'];
    $email = $_GET['email'];
    $nascimento = $_GET['nascimento'];

    $sql = "INSERT INTO tb_cliente (nome, endereco, email, data_nascimento) VALUES (?, ?, ?, ?);";

    $comando = mysqli_prepare($conexao, $sql);

    // letra s -> varchar, date
    // letra d -> float, decimal
    // letra i -> int
    mysqli_stmt_bind_param($comando, "ssss", $nome, $endereco, $email, $nascimento);

    mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);

    header("Location: index.php");
?>
