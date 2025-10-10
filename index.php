<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <h2>Acesso ao sistema</h2>
    <form action="verificar_login.php" method="POST">
        E-mail: <br>
        <input type="text" name="email"> <br><br>

        Senha: <br>
        <input type="text" name="senha"> <br><br>

        <?php
        if (isset($_GET['msg'])) {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "<p>Dados incorretos.</p>";
            echo "</div>";
        }
        ?>

        <input type="submit" value="Acessar">
    </form>
</body>

</html>
