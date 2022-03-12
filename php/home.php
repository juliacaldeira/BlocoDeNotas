<?php 
include("../html/header.html");
include("../html/body.html");
include("../html/footer.html");

if(isset($_POST['criar'])) {
    header("Location: ./nota.php");
}


?>