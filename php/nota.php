<?php 
//require("../html/header.html");
require("../html/nota.html");
require("./aut.php");

if(isset($_POST['salvar'])) {

    $nota = $_POST['nota'];
    $user = user_atual();

if(!empty($_POST['nota'])) {

    $conexao = mysqli_connect("localhost", "root", "", "bloco_notas");
    $string_sql = "INSERT INTO nota (nota_id, text, usuario_id) VALUES (null,'$nota','$user')";

    mysqli_query($conexao, $string_sql);
    mysqli_close($conexao);

} else {
    echo '<script>alert("Nota vazia!");</script>';
}
}

if(isset($_POST['voltar'])) {
    header("Location: ./home.php");
    die();
}
