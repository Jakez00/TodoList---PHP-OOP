<?php

include('../dbconnect.php');
$id = $_POST['id'];

$query = "SELECT * FROM todolist where id=$id";
$sql = mysqli_query($db,$query);
$result =mysqli_fetch_assoc($sql);

if(!empty($result)){
    $update = "UPDATE todolist SET isComplete = 1 WHERE id=$id";
    mysqli_query($db,$update);
}