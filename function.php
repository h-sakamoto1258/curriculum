<?php
// function.php
/**
 * $_SESSION["user_name"]が空だった場合、ログインページにリダイレクトする
 * @return void
 */
function check_user_logged_in() {
    session_start();
    if (empty($_SESSION["user_name"])) {
        header("Location: login.php");
        exit;
    }
}