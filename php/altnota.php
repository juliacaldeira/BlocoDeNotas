<?php
require("./nota.php");

$url_nota_id = substr($_SERVER["REQUEST_URI"], -1);

    $conexao = mysqli_connect("localhost", "root", "", "bloco_notas");
    $pegarNota = mysqli_query($conexao, "SELECT text FROM nota WHERE nota_id = '$url_nota_id'");
    
    while($nota = mysqli_fetch_array($pegarNota)) {
        $nota = $nota['text'];
        echo '<script>
        document.getElementByClassName("textarea").textContent ='.$nota.'
        
        </script>';
    }
?>
