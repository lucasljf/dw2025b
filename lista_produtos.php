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
        $sql = "SELECT * FROM tb_produto";

        $comando = mysqli_prepare($conexao, $sql);

        mysqli_stmt_execute($comando);

        $resultados = mysqli_stmt_get_result($comando);

        echo "<table border='1'>";
        echo "<tr>";
        echo "<td>ID</td>";
        echo "<td>FOTO</td>";
        echo "<td>Nome</td>";
        echo "<td>Data de Validade</td>";
        echo "<td>Quantidade</td>";
        echo "</tr>";
        //imprimir os produtos.
        while ($produto = mysqli_fetch_assoc($resultados)) {
            // print_r($produto);
            $id = $produto['id_produto'];
            $nome = $produto['nome'];
            $validade = $produto['data_validade'];
            $quantidade = $produto['quantidade'];
            $foto = $produto['foto'];
            
            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td><img src='fotos/$foto'></td>";
            echo "<td>$nome</td>";
            echo "<td>$validade</td>";
            echo "<td>$quantidade</td>";
            echo "</tr>";
            // echo "$id - $nome";
            // echo "<br>";
        }
        echo "</table>";


        mysqli_stmt_close($comando);
    ?>
</body>
</html>
