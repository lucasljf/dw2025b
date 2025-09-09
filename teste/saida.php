<?php

session_start();
$nome = $_SESSION['nome'];
$email = $_SESSION['email'];
$endereco = $_SESSION['endereco'];
$telefone = $_SESSION['telefone'];
$cpf = $_GET['cpf'];


echo "simulando a gravação no banco...<br>";
echo $nome . "<br>";
echo $email . "<br>";
echo $endereco . "<br>";
echo $telefone . "<br>";
echo $cpf . "<br>";

// session_destroy();
?>