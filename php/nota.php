<?php 
require("../html/nota.html");
require("./aut.php");

if(isset($_POST['salvar'])) {

    $nota = $_POST['nota'];
    $user = user_atual();
    header("Location: ./home.php");

if(!empty($_POST['nota'])) {

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
if(isset($_POST['excluir'])) {
    echo '<script>alert("Comando inválido");</script>';
}
