<?php
require("../html/nota.html");
?>
<script>
    function mostrarNota(texto) {
    textarea.textContent = texto;
}
</script>
<?php

    $url_nota_id = substr($_SERVER["REQUEST_URI"], -10);

    $conexao = mysqli_connect("localhost", "root", "", "bloco_notas");
    $pegarNota = mysqli_query($conexao, "SELECT text FROM nota WHERE nota_id = '$url_nota_id'");

    while($nota = mysqli_fetch_array($pegarNota)) {
        $nota = $nota['text'];
        echo "<script>mostrarNota('$nota');</script>";
    }

    if(isset($_POST['excluir'])) {
        $string = "DELETE FROM nota WHERE nota_id = '$url_nota_id'";
        mysqli_query($conexao, $string);
        header("Location: ./home.php");
        die();
    }
    if(isset($_POST['salvar'])) {
        $altNota = $_POST['nota'];
        $string = "UPDATE nota SET text = '$altNota' WHERE nota_id = '$url_nota_id'";
        mysqli_query($conexao, $string);
        header("Location: ./home.php");
        die();
    }
    
    if(isset($_POST['voltar'])) {
    header("Location: ./home.php");
    die();
    }
?>
