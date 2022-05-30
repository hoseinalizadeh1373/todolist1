<?php

class Valid {

    public function repassword($pass1,$pass2)
    {
        if($pass1 !=$pass2){
            return false;
        }    
        return true;
    }

    public function checkuser($username)
    {
        
        if($username!=""){
            load_models("User");
            $userinuse = new User();

        $res = $userinuse->checkifExists($username);
        return $res;
        }
    }
}