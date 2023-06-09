<?php
session_start();

include('../dbconnect.php');
include('../classes/loginClass.php');

$login = new login($db);

$username = trim($_POST['username']);
$password = trim($_POST['pass']);

$login->setUsername($username);
$login->setPassword($password);
$login->login();

