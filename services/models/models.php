<?php

// require (__DIR__."/BaseModel.php");

function load_models($filename){
    try{
        // if(class_exists($filename))
        // return;

        $filePath =__DIR__."/$filename.php";
        if(file_exists($filePath))
        {
            require_once($filePath);
        
        }
    }catch (Exception $e){
        echo $e;
    }
    
}
