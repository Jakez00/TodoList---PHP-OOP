<?php
session_start();
include('../dbconnect.php');
include('../classes/todoClass.php');

$store = new todo($db);

$task = $_POST['task'];
$taskdate = $_POST['date'];

$store->setName($task);
$store->setDate($taskdate);
$store->storeTodo();