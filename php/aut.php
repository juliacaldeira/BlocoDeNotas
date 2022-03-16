<?php
session_start();

function aut_user($id) {
    $_SESSION['user_id'] = $id;
}

function user_atual() {
    return $_SESSION['user_id'];
}
