<?php 
require("../html/index.html");

if(isset($_POST['cadastro'])) {
    header("Location: ./cadastro.php");
    die();
}
if(isset($_POST['login'])) {
    header("Location: ./login.php");
    die();
}