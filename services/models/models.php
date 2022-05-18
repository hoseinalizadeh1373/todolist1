<?php

// require (__DIR__."/BaseModel.php");

function load_models($filename){
    try{
        $filePath =__DIR__."/$filename.php";
        if(file_exists($filePath))
        {
            require($filePath);
        
        }
    }catch (Exception $e){
        echo $e;
    }
    
}
