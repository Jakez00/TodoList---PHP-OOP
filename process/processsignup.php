<?php
include('../dbconnect.php');

$username = trim($_POST['username']);
$password = $_POST['pass'];
$password2 = $_POST['pass2'];

$checkuser = "SELECT * FROM users WHERE username='".$username."'";
$sqlcheck = mysqli_query($db,$checkuser);
$chck = mysqli_fetch_assoc($sqlcheck);

if(!empty($chck)){
    echo "User Already Exist";
}
else if(empty($username)){
    echo "Username is empty!";
}else if(empty($password) || empty($password2)){
    echo "Password is empty!";
}else if($password != $password2){
    echo "Password did not match!";
}else{
    $query = "INSERT into users (username,password) VALUES ('".$username."','".md5($password)."')";
    $sql = mysqli_query($db,$query);
    
    echo 1;
}
