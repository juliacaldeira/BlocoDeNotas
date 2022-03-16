<?php 
require("../html/header.html");
require("./aut.php");

    $user = user_atual();
    $conexao = mysqli_connect("localhost", "root", "", "bloco_notas");
    $pegarNotas = mysqli_query($conexao, "SELECT nota_id, text FROM nota WHERE usuario_id = '$user'");

    $linhas = mysqli_num_rows($pegarNotas);
    $dados = array();
    $ids = array();
    if($linhas > 0) {
        while($coluna = mysqli_fetch_array($pegarNotas)) {
            array_push($dados, $coluna['text']);
            array_push($ids, $coluna['nota_id']);
        }
    }
    mysqli_close($conexao);
?>
    <html>
    <link rel="stylesheet" href="../Css/home.css">
    <script src="../script.js"></script>
        <div id="linha"></div>
        <div id="grid">
           <?php 
                $i = 0;
                foreach($dados as $arr) {
                    echo '<div class="nota-grid" id="'.$ids[$i].'" onclick="notasredirect('.$ids[$i].');">'.$arr.'</div>';
                    $i++;
                }
            ?> 
        </div>
    </body>
    </html>

<?php
if(isset($_POST['criar'])) {
    header("Location: ./nota.php");
}
if(isset($_POST['sair'])) {
    session_destroy();
    header("Location: ./index.php");
    die();
}
?>

