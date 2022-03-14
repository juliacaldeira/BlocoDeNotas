<?php 
require("../html/login.html");
require("./aut.php");

if(isset($_POST['but'])) {
    if((!empty($_POST['entry'])) && (!empty($_POST['senha']))) {

        $entrada = $_POST['entry'];
        $senha = md5($_POST['senha']);

        $conexao = mysqli_connect("localhost", "root", "", "bloco_notas");
        $verifEntradaUser = mysqli_query($conexao, "SELECT * FROM usuario WHERE username = '$entrada'");
        $verifEntradaEmail = mysqli_query($conexao, "SELECT * FROM usuario WHERE email = '$entrada'");
        $verifSenha = mysqli_query($conexao, "SELECT * FROM usuario WHERE senha = '$senha'");

        $linhasEntUser = mysqli_num_rows($verifEntradaUser);
        $linhasEntEmail = mysqli_num_rows($verifEntradaEmail);
        $linhasSenha = mysqli_num_rows($verifSenha);

        if($linhasEntUser > 0) {
            $dado = mysqli_fetch_array($verifEntradaUser);
            aut_user($dado['usuario_id']); 
        } else if ($linhasEntEmail > 0) {
            $dado = mysqli_fetch_array($verifEntradaEmail);
            aut_user($dado['usuario_id']);
        }

        mysqli_close($conexao);

        if(($linhasEntUser > 0) || ($linhasEntEmail > 0)) {
            if($linhasSenha > 0) {
               header("Location: ./home.php");
               die();
            }
        } else {
            echo '<script> Usuário/Email e/ou senha incorretos. </script>';
        } 
    }
}