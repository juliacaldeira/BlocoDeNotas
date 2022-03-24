<?php
session_start();

function aut_user($id) {
    $_SESSION['user_id'] = $id;
}

function user_atual() {
    return $_SESSION['user_id'];
}

$conexao = mysqli_connect("localhost", "root", "", "bloco_notas");

function set_email($em) {
    $_SESSION['email'] = $em;
}
function get_email() {
    return $_SESSION['email'];
}