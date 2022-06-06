<?php

namespace Services\Controller;

use Services\Models\ToDoList;
use Services\Layout\Layout;

class HomeController
{
    public function index()
    {
        $todolist = new ToDoList;

       
        $result = $todolist->SelectFromDataBase();
        Layout::render('index', ["result" => $result]);
    }
    public function store(){

        $todolist = new ToDoList;
        $actions = ['insert', 'delete', 'done'];

        if (isset($_POST['action']) and in_array($_POST['action'], $actions)) {

            $action = $_POST['action'];

            $todolist->$action();

            redirect('/');
        }
    }
    public function about(){
        Layout::render('about',[]);
    }

}
