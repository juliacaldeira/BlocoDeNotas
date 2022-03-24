<?php 
require("../html/verif.html");
require("./aut.php");

ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$emailenvio = "kiwicurioso@gmail.com";
$emaildestino = "julia.pcfranca@gmail.com";
$assunto = "Verificação de conta";
$arquivo = "foi";

$headers = "From:" . $emailenvio;

$enviar = mail($emaildestino,$assunto,$arquivo);
