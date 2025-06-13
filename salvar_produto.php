<?php
    $nome = $_GET['nome'];
    $data_validade = $_GET['data_validade'];
    $quantidade = $_GET['quantidade'];

    // informações do banco de dados
    $servidor = "db";
    $usuario = "root";
    $senha = "123";
    $banco = "banco_elaine";

    // se conectar ao banco
    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);


    // INSERT INTO tb_produto (nome, data_validade, quantidade) VALUES ("Pepsi", "2025-12-30", 200);
    
    $sql = "INSERT INTO tb_produto (nome, data_validade, quantidade) VALUES (?, ?, ?);";

    $comando = mysqli_prepare($conexao, $sql);

    // letra s -> varchar, date
    // letra d -> float, decimal
    // letra i -> int
    mysqli_stmt_bind_param($comando, "ssi", $nome, $data_validade, $quantidade);

    mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);

    header("Location: index.php");
?>
