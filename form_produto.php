<?php
require_once "verifica_logado_funcionario.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Cadastrar Produto</h1>

    <form action="salvar_produto.php" method="post" enctype="multipart/form-data">
        Nome: <br>
        <input type="text" name="nome"> <br><br>
        Data de validade: <br>
        <input type="text" name="data_validade"> <br><br>
        Quantidade: <br>
        <input type="text" name="quantidade"> <br><br>

        Categoria: <br>
        <select name="categoria">
            <?php
            require_once "conexao.php";

            $sql = "SELECT * FROM tb_categoria";
            $comando = mysqli_prepare($conexao, $sql);
            mysqli_stmt_execute($comando);

            $resultados = mysqli_stmt_get_result($comando);

            while ($categoria = mysqli_fetch_assoc($resultados)) {
                $nome = $categoria['nome'];
                $id = $categoria['id_categoria'];

                echo "<option value='$id'>$nome</option>";
            }

            mysqli_stmt_close($comando);
            ?>
        </select> <br><br>

        Foto: <br>
        <input type="file" name="foto"> <br><br>

        <input type="submit" value="Cadastrar Produto">
    </form>
</body>

</html>
