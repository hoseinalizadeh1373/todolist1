<?php

require("../loader.php");

load_models("BaseModel");
load_models("User");

$user = new User();


if (isset($_POST['action']) and $_POST['action'] == "login") {

    $userdata = $user->login($_POST['username'], $_POST['password']);
    if ($userdata) {
        Auth::login($userdata['id']);
        redirect("./index.php");
    } else {
        echo "not found";
    }
}

layout::pageHeader("ورود کاربران");

?>

<div class="container-md  mr-auto p-5 shadow p-5 mb-5 bg-dark rounded d-flex flex-column jusitify-content-center align-items-center ">

    <form method="post" autocomplete="off" class="border rounded p-5 sshadow-good">
        <!-- <input type="text" name="action" value="name" placeholder="name"/> -->
        <input type="hidden" name="action" value="login" />

        <label for="username" class="form-label text-warning align-self-start">نام کاربری</label>
        <input type="text" name="username" class="form-control w-100" placeholder="username" />
        <br />
        
        <label for="username" class="form-label text-warning">رمز عبور</label>
        <input type="password" name="password" class="form-control w-100" placeholder="password" />

        <div class="col text-center">
        <button class="mt-3 btn btn-warning w-50 align-self-center">تایید</button>
        </div>
       
    </form>

    
</div>
<?php
layout::pageFooter("");
