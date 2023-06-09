<?php

class login{
    public $username;
    public $password;
    public $dbconnect;

    public function __construct($db) {
        $this->dbconnect = $db;
    }

    public function setUsername($username){
        $this->username = $username;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }

    public function login() {
        $stmt = $this->dbconnect->prepare("SELECT * FROM users where username = ? and password = ?");
        $stmt->bind_param('ss',$this->username, md5($this->password));
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $row['username'];
            $_SESSION['userid'] = $row['id'];
            $_SESSION['isLogin'] = 1;
            header("Location: ../index.php");
            } else {
                $_SESSION['Error']="Invalid Credential";
                header("Location: ../signin.php");
            }
    }
    
}