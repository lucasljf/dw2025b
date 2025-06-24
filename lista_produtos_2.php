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

        div {
            border-style: solid;
        }

        .conteiner {
            border-color: blue;
            display: flex;
            flex-wrap: wrap;
        }

        .produto {
            border-color: lightblue;
            margin: 20px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <h2>Lista de Produtos Cadastrados</h2>

    <a href="index.php">Voltar</a> <br><br>
    <div class="conteiner">
    <?php
        require_once "conexao.php";

        $sql = "SELECT * FROM tb_produto";

        $comando = mysqli_prepare($conexao, $sql);

        mysqli_stmt_execute($comando);

        $resultados = mysqli_stmt_get_result($comando);

        while ($produto = mysqli_fetch_assoc($resultados)) {
            // print_r($produto);
            $id = $produto['id_produto'];
            $nome = $produto['nome'];
            $validade = $produto['data_validade'];
            $quantidade = $produto['quantidade'];
            $foto = $produto['foto'];
            
            echo "<div class='produto'>";
            echo "<img src='#'>";
            echo "<h2>$nome</h2>";
            echo "<p>Validade <span>$validade</span></p>";
            echo "</div>";
        }
        mysqli_stmt_close($comando);
    ?>
    </div>
</body>
</html>
