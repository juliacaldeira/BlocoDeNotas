<?php 
require("../html/header.html");
require("./aut.php");

    $user = user_atual();
    $conexao = mysqli_connect("localhost", "root", "", "bloco_notas");
    $pegarNotas = mysqli_query($conexao, "SELECT nota_id FROM nota WHERE usuario_id = '$user'");

    $linhas = mysqli_num_rows($pegarNotas);
    $dados = array('sla');
    if($linhas > 0) {
        $dados = mysqli_fetch_array($pegarNotas);
        var_dump($dados);

    }
?>
    <html>
    <link rel="stylesheet" href="">
            <form method="POST" class="form">
            <input type="submit" value="Excluir nota" class="but" name="excluir">
            <select name="ordem" id="ordem">
                <option value="">Ordernar por</option>
            </select>
            </form>
        </div>
    
        <div id="grid">
            <?php foreach($dados as $arr) {
                var_dump($dados);
                echo '<div class="grid-item">'.$arr.'</div>';
            } ?>
        </div>
    
    </body>
    </html>

<?php
require("../html/footer.html");

if(isset($_POST['criar'])) {
    header("Location: ./nota.php");
}
if(isset($_POST['sair'])) {
    session_destroy();
    header("Location: ./index.php");
    die();
}
?>

