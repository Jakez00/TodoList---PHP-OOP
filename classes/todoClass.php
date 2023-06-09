<?php 

class todo{
    public $name;
    public $date;
    public $completed;
    public $dbconnect;

    public function __construct($db){
        $this->dbconnect = $db;
    }

    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
    public function setDate($date){
        $this->date = $date;
    }
    public function getDate(){
        return $this->date;
    }

    public function storeTodo(){
        if(!empty($this->name) && !empty($this->date)){

            $stmt = $this->dbconnect->prepare("INSERT INTO todolist (name,date,userId) values (?,?,?)");
            $stmt->bind_param('ssi',$this->name,$this->date,$_SESSION['userid']);
            $stmt->execute();
            if($stmt->affected_rows > 0){
                echo '1';
            }else{
                echo 'Error Saving';
            }

            // $sql = "INSERT INTO todolist (name, date,userId) VALUES ('" . $this->getName() . "', '" . $this->getDate() . "','".$_SESSION['userid']."');";
            // mysqli_query($this->dbconnect,$sql);
            

        }
        else{
            echo 'Fill out all fields';
        }
    }

    public function updateTodo($id){

        $stmt = $this->dbconnect->prepare('SELECT * FROM todolist where id = ?');
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->fetch_assoc() > 0){
            if(empty($this->name)){
                echo 'Empty task name';
            }else{
                $update = $this->dbconnect->prepare("UPDATE todolist SET name = ? WHERE id = ?");
                $update->bind_param('si', $this->name, $id);
                $update->execute();
                if($update){
                    echo '1';
                }else{
                    echo 'Error';
                }
            }
        }else{
            echo 'Error Updating';
        }

        // $query = "SELECT * FROM todolist where id=$id";
        // $sql = mysqli_query($this->dbconnect,$query);
        // $result =mysqli_fetch_assoc($sql);

        // if(!empty($result)){
        //     if(!empty($this->name)){
        //         $update = "UPDATE todolist SET name = '".$this->getName()."' WHERE id=$id";
        //         mysqli_query($this->dbconnect, $update);
        //         echo '1';
        //     }
        //     else{
        //         echo 'Empty Name';
        //     }
        // }
    }

    public function deleteTodo($id){
        $stmt = $this->dbconnect->prepare("SELECT * FROM todolist where id = ?");
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->fetch_assoc() > 0){
            $delete = $this->dbconnect->prepare("DELETE FROM todolist WHERE id = ?");
            $delete->bind_param('i',$id);
            $delete->execute();
            if($delete){
                echo '1';
            }else{
                echo 'Error Deleting';
            }
        }

        // $query = "SELECT * FROM todolist where id = $id";
        // $mysql = mysqli_query($this->dbconnect,$query);
        // $result = mysqli_fetch_assoc($mysql);

        // if(!empty($result)){
        //     mysqli_query($this->dbconnect,"DELETE from todolist where id=$id");
        //     echo 1;
        // }else{
        //     echo "Unable to Delete";
        // }
    }

    public function todoComplete($id){
        $stmt = $this->dbconnect->prepare("SELECT * FROM todolist where id = ?");
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->fetch_assoc() > 0){
            $update = $this->dbconnect->prepare("UPDATE todolist SET isComplete = 1 where id = ?");
            $update->bind_param('i',$id);
            $update->execute();
            if($update){
                echo '1';
            }else{
                echo 'Error Updating';
            }
        }else {
            echo 'No matching row found';
        }
        
        // $query = "SELECT * FROM todolist where id=$id";
        // $sql = mysqli_query($this->dbconnect,$query);
        // $result =mysqli_fetch_assoc($sql);

        // if(!empty($result)){
        //     $update = "UPDATE todolist SET isComplete = 1 WHERE id=$id";
        //     mysqli_query($this->dbconnect,$update);
        // }
    }
}

?>