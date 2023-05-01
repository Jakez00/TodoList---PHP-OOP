<?php
session_start();

include('../dbconnect.php');

$username = trim($_POST['username']);
$password = trim($_POST['pass']);

$checkuser = "SELECT * FROM users WHERE username='".$username."' and password='".md5($password)."'";
$sqlcheck = mysqli_query($db,$checkuser);
$chck = mysqli_fetch_assoc($sqlcheck);

if(empty($chck)){
    $_SESSION['Error']="Invalid Credential";
    header('location:../signin.php');
    exit();
}
else{
    $_SESSION['isLogin'] = 1;
    $_SESSION['userid'] = $chck['id'];
    $_SESSION['username'] = $chck['username'];
    header('location: ../index.php');
}
