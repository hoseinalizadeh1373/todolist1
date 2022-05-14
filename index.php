<?php

require("./functions.php");


$conn = connectToHost();

pageHeader("صفحه اصلی");

/**
 * 
 * for insert data
 * 
 */
if(isset($_POST['send'])){
  insertToDatabase($conn,$_POST['task']);
}
//======================


/**
 * 
 * for update data
 */
if(isset($_POST['checked'])){
$tasks = (isset($_POST['check'])) ? $_POST['check'] : array();
if (count($tasks) > 0) { 
    foreach ($tasks as $task) {  
        UpdateDatabase($conn,$task);
    }  
} 
}
//==========================
?>

<div class="container mt-1 border rounded bg-dark text-info  d-flex flex-column  pt-2">
    <div class="row  d-flex flex-column jusitify-content-center align-items-center m-2" >
        <div class="col-md-6">

            <form method="POST" >
                <div class="input-group mb-3">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon1" name="send">اضافه کردن</button>
                    <input type="text" class="form-control" name="task" placeholder="عنوان وظیفه / تسک" aria-label="Example text with button addon" aria-describedby="button-addon1">
                </div>
            </form>

        </div>
    </div>
    <div class="row d-flex flex-column ">
        <div class="col-md-15 ">
            <ul class="list-group p-2 ">
                <form method="POST">
            
<?php


select($conn);

?>
            <!-- </div> -->
            <button class="btn btn btn-outline-warning  mx-auto d-block text-light " type="submit" id="button-addon1" name="checked">تغییر وضعیت </button>
            </form>
            </ul>
        </div>
    </div>
</div>

<?php




pageFooter();
