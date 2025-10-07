<?php
session_start();
require_once "conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM tb_usuario WHERE email = ? AND senha = ?";
$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($comando, "ss", $email, $senha);

mysqli_stmt_execute($comando);

$resultados = mysqli_stmt_get_result($comando);

$quantidade = mysqli_num_rows($resultados);

if ($quantidade == 0) {
    header("Location: index.php");
}
else {
    $usuario = mysqli_fetch_assoc($resultados);
    $tipo = $usuario['tipo'];
    $id = $usuario['id_usuario'];

    $_SESSION['tipo'] = $tipo;
    $_SESSION['id'] = $id;

    //consulta aos dados da pessoa
    if ($tipo == 'c') {
        $sql = "SELECT * FROM tb_cliente.....";
    }
    else {
        $sql = "SELECT * FROM tb_funcionario....";
    }

    header("Location: home.php");
}
?>
