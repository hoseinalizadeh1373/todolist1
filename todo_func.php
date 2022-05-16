<?php

$conn = ConnectToDataBase();

  if(isset($_POST['send'])){

    InsertToDataBase($conn,$_POST['task']);

  }

  if(isset($_POST['checked'])){

    $tasks = (isset($_POST['check'])) ? $_POST['check'] : array();

    if (count($tasks) > 0) { 

        foreach ($tasks as $task) {  

            UpdateRecord($conn,$task);

        }  

     } 

    }
  
  if(isset($_POST['delete'])){
 
            DeleteRecord($conn,$_POST['delete']);
  }
function func(){
    echo "ss";
}
function ConnectToDataBase(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "todo";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    if (!$conn) {
        die(" ---------- Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}
function SelectFromDataBase ($conn){
    $sql = "SELECT * FROM `list` order by `id`";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function InsertToDataBase($conn,$value){
   $query = "insert into `list` (title,done)values('".$value."','0')";
   $result = mysqli_query($conn,$query);
   return $result;
}

function UpdateRecord($conn,$values){
   $query = "update `list` set done='1' where id='".$values."'";
   $result = mysqli_query($conn,$query);
   return $result;
}

function DeleteRecord($conn,$value){
$query = "delete from `list` where `list`.id ='".$value."'";
$result = mysqli_query($conn,$query);
return $result;
}