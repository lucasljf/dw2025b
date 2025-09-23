<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Lista de Clientes</h2>

    <a href="index.php">Voltar</a> <br><br>
    <?php
        require_once "conexao.php";

        $sql = "SELECT * from tb_cliente";

        $comando = mysqli_prepare($conexao, $sql);

        mysqli_stmt_execute($comando);

        $resultados = mysqli_stmt_get_result($comando);

        echo "<table border='1'>";
        echo "<tr>";
        echo "<td>ID</td>";
        echo "<td>Nome</td>";
        echo "<td>Endereço</td>";
        echo "<td>E-mail</td>";
        echo "<td>Data de Nascimento</td>";
        echo "<td colspan='2'>AÇÕES</td>";
        echo "</tr>";
        //imprimir os produtos.
        while ($cliente = mysqli_fetch_assoc($resultados)) {
            // print_r($produto);
            $id = $cliente['id_cliente'];
            $nome = $cliente['nome'];
            $endereco = $cliente['endereco'];
            $email = $cliente['email'];
            $nascimento = $cliente['data_nascimento'];
            
            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>$nome</td>";
            echo "<td>$endereco</td>";
            echo "<td>$email</td>";
            echo "<td>$nascimento</td>";
            echo "<td><a href='form_cliente.php?id=$id'>editar</a></td>";
            echo "</tr>";
        }
        echo "</table>";


        mysqli_stmt_close($comando);
    ?>
</body>
</html>
