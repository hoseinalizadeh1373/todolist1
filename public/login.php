<?php

require("../loader.php");


use Services\Auth\Auth;
use Services\Layout\Layout;
use Services\Models\User;

$user = new User();
$error_log ="";
if (isset($_POST['action']) and $_POST['action'] == "login") {

    $userdata = $user->login($_POST['username'], $_POST['password']);
    if ($userdata) {
        Auth::login($userdata['id']);
        redirect("./index.php");
    } else {
         $error_log = "کاربری با این مشخصات یافت نشد!";
    }
}

Layout::rendergir('login',["error_log" => $error_log]);
?>



