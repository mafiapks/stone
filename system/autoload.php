<?php
date_default_timezone_set('America/Sao_Paulo');

function __autoload($classe)
{
    include_once "classes/{$classe}.class.php";
}

$company = "MAFIADO7";

$Basic = new Basic();
