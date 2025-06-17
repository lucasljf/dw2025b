<?php
    require_once "conexao.php";
    
    $nome = $_POST['nome'];
    $data_validade = $_POST['data_validade'];
    $quantidade = $_POST['quantidade'];

    $nome_arquivo = $_FILES['foto']['name'];
    $caminho_temporario = $_FILES['foto']['tmp_name'];

    // pegar a extensão
    $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

    // gerar um novo nome para o arquivo
    $novo_nome = uniqid() . "." . $extensao;

    // definir onde vou salvar no servidor
    // lembre-se de criar a pasta e ajustar as permissões
    $caminho_destino = "fotos/" . $novo_nome;

    // copiar para o servidor
    move_uploaded_file($caminho_temporario, $caminho_destino);

    // INSERT INTO tb_produto (nome, data_validade, quantidade) VALUES ("Pepsi", "2025-12-30", 200);
    $sql = "INSERT INTO tb_produto (nome, data_validade, quantidade, foto) VALUES (?, ?, ?, ?)";

    $comando = mysqli_prepare($conexao, $sql);

    // letra s -> varchar, date
    // letra d -> float, decimal
    // letra i -> int
    mysqli_stmt_bind_param($comando, "ssis", $nome, $data_validade, $quantidade, $novo_nome);

    mysqli_stmt_execute($comando);

    mysqli_stmt_close($comando);

    header("Location: index.php");
?>
