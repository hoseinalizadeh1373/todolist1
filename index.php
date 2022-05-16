<?php


require("./todo_func.php");
require("./functions.php");

pageHeader("صفحه اصلی");

?>

<div class="container mt-1 border rounded bg-dark text-info  d-flex flex-column  pt-2">
    <div class="row  d-flex flex-column jusitify-content-center align-items-center m-2">
        <div class="col-md-6">

            <form method="POST">
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

                    $result = SelectFromDataBase($conn);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            $secondary = $row['done'] ? "'flexSwitchCheckCheckedDisabled'  checked disabled" : "flexSwitchCheckDefault";
                            echo "<div class='form-check form-switch  rounded  border-bottom border-warning pt-1 pb-1 mb-1 rower'>" .

                                "<label class='form-check-label label' for='flexSwitchCheckChecked'>" . $row['title'] . "</label>" .

                                "<input class='form-check-input  align-self-right ' name='check[]' value='" . $row['id'] . "' type='checkbox' id=" . $secondary . "> <br>" .

                                "<button name='delete' type='submit' class='positioner' value='$row[id]' data-bs-toggle='modal' data-bs-target='#exampleModal' >" . '<i class="bi bi-trash text-dark"></i>' . "</button>" .

                                "</div>";
                        }
                    } else {
                        echo "<li class='list-group-item list-group-item-warning'>هیچ تسکی اضافه نشده است</li>";
                    }
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
