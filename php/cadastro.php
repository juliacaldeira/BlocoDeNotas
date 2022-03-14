<?php 
require("../html/cadastro.html");

if(isset($_POST['but'])) {
if( (!empty($_POST['nome'])) && (!empty( $_POST['username'])) && (!empty( $_POST['email'])) && (!empty( $_POST['senha'])) ) {
    
    $nome = $_POST['nome'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $conexao = mysqli_connect("localhost", "root", "", "bloco_notas");
    $verifUsername = mysqli_query($conexao, "SELECT * FROM usuario WHERE username = '$username'");
    $verifEmail = mysqli_query($conexao, "SELECT * FROM usuario WHERE email = '$email'");

    $linhasUsername = mysqli_num_rows($verifUsername);
    $linhasEmail = mysqli_num_rows($verifEmail);
    
    if((!$linhasUsername > 0) && (!$linhasEmail > 0)) {
        $string_sql = "INSERT INTO usuario (usuario_id, name, username, email, senha) VALUES (null, '$nome', '$username', '$email', '$senha')";

        mysqli_query($conexao, $string_sql);

        mysqli_close($conexao);
        
        header("Location: ./index.php");
        die();
    }
    else if ($linhasUsername > 0) {
        echo '<script>alert("O nome de usuário inserido já existe.");</script>';
    } else {
        echo '<script>alert("O email inserido já existe.");</script>';
    }
}}

?>