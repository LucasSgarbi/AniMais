<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$DB = "animais";

$conexao = mysqli_connect($servidor, $usuario, $senha) or die("Erro na Conexão");

mysqli_select_db($conexao, $DB);
?>