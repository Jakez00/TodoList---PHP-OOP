<?php
    include('../dbconnect.php');
    include('../classes/todoClass.php');

    $store = new todo($db);

    $id = $_POST['id'];
    $name = $_POST['name'];
    
    $store->setName($name);
    $store->updateTodo($id);