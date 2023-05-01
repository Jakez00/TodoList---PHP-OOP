<?php
    include('../dbconnect.php');
    $id = $_POST['id'];
    $name = $_POST['name'];

    $query = "SELECT * FROM todolist where id=$id";
    $sql = mysqli_query($db,$query);
    $result =mysqli_fetch_assoc($sql);

    if(!empty($result)){
        $update = "UPDATE todolist SET name = '".$name."' WHERE id=$id";
        mysqli_query($db,$update);
    }