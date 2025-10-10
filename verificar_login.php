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
    header("Location: index.php?msg=erro");
} else {
    $usuario = mysqli_fetch_assoc($resultados);
    $tipo = $usuario['tipo'];
    $id = $usuario['id_usuario'];

    $_SESSION['tipo'] = $tipo;
    $_SESSION['id'] = $id;

    //consulta aos dados da pessoa
    if ($tipo == 'c') {
        $sql = "SELECT * FROM tb_cliente WHERE id_usuario = ?";
        $comando = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($comando, "i", $id);
        mysqli_stmt_execute($comando);

        $resultados = mysqli_stmt_get_result($comando);
        $cliente = mysqli_fetch_assoc($resultados);

        $_SESSION['id_cliente'] = $cliente['id_cliente'];
        $_SESSION['nome'] = $cliente['nome'];
        $_SESSION['endereco'] = $cliente['endereco'];
        $_SESSION['data_nascimento'] = $cliente['data_nascimento'];
    } else {
        $sql = "SELECT * FROM tb_funcionario WHERE id_usuario = ?";
        $comando = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($comando, "i", $id);
        mysqli_stmt_execute($comando);

        $resultados = mysqli_stmt_get_result($comando);
        $funcionario = mysqli_fetch_assoc($resultados);

        //É seguro gravar todos esses dados na SESSION?
        //É uma boa prática gravar todos esses dados na SESSION?
        $_SESSION['id_funcionario'] = $funcionario['id_funcionario'];
        $_SESSON['nome'] = $funcionario['nome'];
        $_SESSION['cargo'] = $funcionario['cargo'];
        $_SESSION['telefone'] = $funcionario['telefone'];
        $_SESSION['salario'] = $funcionario['salario'];
        $_SESSION['cpf'] = $funcionario['cpf'];
    }

    header("Location: home.php");
}
