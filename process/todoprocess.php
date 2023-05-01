<?php
session_start();
include('../dbconnect.php');

$task = $_POST['task'];
$taskdate = $_POST['date'];

if(empty($task)){
    echo 'Empty Task';
}else if(empty($taskdate)){
    echo 'Date is not set';
}else{
    $sql = "INSERT INTO todolist (name, date,userId) VALUES ('" . $task . "', '" . $taskdate . "','".$_SESSION['userid']."');";
    $query = mysqli_query($db,$sql);
    echo '1';
}