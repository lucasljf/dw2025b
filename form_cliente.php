<?php

if (isset($_GET['id'])) {
    // echo "editar...";

    $id = $_GET['id'];

    require_once "conexao.php";
    $sql = "SELECT * FROM tb_cliente WHERE id_cliente = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, "i", $id);
    mysqli_stmt_execute($comando);

    $resultados = mysqli_stmt_get_result($comando);

    $cliente = mysqli_fetch_assoc($resultados);

    $nome = $cliente['nome'];
    $endereco = $cliente['endereco'];
    $email = $cliente['email'];
    $nascimento = $cliente['data_nascimento'];

    mysqli_stmt_close($comando);
}
else {
    // echo "novo...";

    $id = 0;
    $nome = "";
    $endereco = "";
    $email = "";
    $nascimento = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadrastro Cliente</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <h1>Cadastro cliente</h1>

    <form action="salvar_cliente.php?id=<?php echo $id; ?>" method="POST">
        Nome: <br>
        <input type="text" name="nome" value="<?php echo $nome; ?>"> <br><br>
        Endereço: <br>
        <input type="text" name="endereco" value="<?php echo $endereco; ?>"> <br> <br>
        Email: <br>
        <input type="text" name="email" value="<?php echo $email; ?>"> <br> <br>
        Data de nascimento: <br>
        <input type="text" name="nascimento" value="<?php echo $nascimento; ?>"> <br> <br>
        <br>
        <input type="submit" class="btn btn-primary" value="Salvar Cliente">

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
