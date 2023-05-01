<?php
include('../dbconnect.php');

$id = $_POST['id'];

$query = "SELECT * FROM todolist where id = $id";
$mysql = mysqli_query($db,$query);
$result = mysqli_fetch_assoc($mysql);

    if(!empty($result)){
        mysqli_query($db,"DELETE from todolist where id=$id");
        echo 1;
    }else{
        echo "Unable to Delete";
    }
    

