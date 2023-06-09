<?php

include('../dbconnect.php');
include('../classes/todoClass.php');

$store = new todo($db);

$id = $_POST['id'];

$store->todoComplete($id);
