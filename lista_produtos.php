<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            width: 60px;
            height: 60px;
        }
    </style>
</head>
<body>
    <h2>Lista de Produtos Cadastrados</h2>

    <a href="index.php">Voltar</a> <br><br>
    <?php
        require_once "conexao.php";

        // SELECT * FROM tb_produto;
        $sql = "SELECT id_produto, tb_produto.nome AS nome_produto, tb_categoria.nome AS nome_categoria, data_validade, quantidade, foto FROM tb_produto INNER JOIN tb_categoria ON tb_produto.id_categoria = tb_categoria.id_categoria ORDER BY id_produto ASC";

        $comando = mysqli_prepare($conexao, $sql);

        mysqli_stmt_execute($comando);

        $resultados = mysqli_stmt_get_result($comando);

        echo "<table border='1'>";
        echo "<tr>";
        echo "<td>ID</td>";
        echo "<td>FOTO</td>";
        echo "<td>Nome</td>";
        echo "<td>Categoria</td>";
        echo "<td>Data de Validade</td>";
        echo "<td>Quantidade</td>";
        echo "<td colspan='2'>AÇÕES</td>";
        echo "</tr>";
        //imprimir os produtos.
        while ($produto = mysqli_fetch_assoc($resultados)) {
            // print_r($produto);
            $id = $produto['id_produto'];
            $nome_produto = $produto['nome_produto'];
            $validade = $produto['data_validade'];
            $quantidade = $produto['quantidade'];
            $foto = $produto['foto'];
            $nome_categoria = $produto['nome_categoria'];
            
            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td><img src='fotos/$foto'></td>";
            echo "<td>$nome_produto</td>";
            echo "<td>$nome_categoria</td>";
            echo "<td>$validade</td>";
            echo "<td>$quantidade</td>";
            echo "<td><a href='deletar_produto.php?id=$id'><img src='delete-button.png'></a></td>";
            echo "<td><a href='#'>editar</a></td>";
            echo "</tr>";
        }
        echo "</table>";


        mysqli_stmt_close($comando);
    ?>
</body>
</html>
