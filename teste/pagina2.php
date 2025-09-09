<?php
session_start();
$_SESSION['nome'] = $_GET['nome'];
$_SESSION['email'] = $_GET['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Página 2</h2>
    <form action="pagina3.php">

        Endereço: 
        <input type="text" name="endereco">

        <br>Telefone: <input type="text" name="telefone">

        <input type="submit" value="Próximo">
    </form>
</body>
</html>