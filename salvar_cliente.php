<?php
    require_once "conexao.php";

    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $nascimento = $_POST['nascimento'];

    if ($id == 0) {
        $sql = "INSERT INTO tb_cliente (nome, endereco, email, data_nascimento) VALUES (?, ?, ?, ?);";
        
        $comando = mysqli_prepare($conexao, $sql);
        
        mysqli_stmt_bind_param($comando, "ssss", $nome, $endereco, $email, $nascimento);
    }
    else {
        $sql = "UPDATE tb_cliente SET nome = ? , endereco = ? , email = ?, data_nascimento = ? WHERE id_cliente = ?";
        
        $comando = mysqli_prepare($conexao, $sql);
        
        mysqli_stmt_bind_param($comando, "ssssi", $nome, $endereco, $email, $nascimento, $id);
    }

    mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);

    header("Location: index.php");
?>
