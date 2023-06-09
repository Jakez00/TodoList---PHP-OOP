<?php
    session_start();
    include ('dbconnect.php');

    if(!isset($_SESSION['isLogin'])){
        header('Location: signin.php');
        exit();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList</title>
    <link rel="stylesheet" href="https://cdn.usebootstrap.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container d-flex m-5 justify-content-end  mx-auto">
        <div>
            <a class="btn btn-warning" href="process/logout.php">Logout</a>
        </div>
    </div>

    <div class="container m-5 p-2 rounded mx-auto bg-light shadow">
    <!-- App title section -->
    <div class="row m-1 p-4">
        <div class="col">
            
             <h1 class="p-1 text-dark text-center mx-auto display-inline-block"><span class="text-uppercase text-info"><?php echo $_SESSION['username'] ?></span>  Todo-List</h1>  
            
        </div>
    </div>
    <!-- Create todo section -->
    <div class="text-center">
        <p class="text-danger" style="font-size: 25px;" id="error"></p>
    </div>
    <div class="row">
        <div class="col col-11 mx-auto">
            <div class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-center">
                <div class="col">
                    <input class="form-control form-control-lg border-0 rounded" type="text" placeholder="Add new .." id="task">
                </div>
                <div class="col-auto m-0 px-2 d-flex align-items-center">
                    <input type="datetime-local" class="form-control form-control-lg" id="taskdate" min="<?php echo date('Y-m-d H:i'); ?>">
                </div>
                <div class="col-auto px-0 mx-0 mr-2">
                    <button type="button" class="btn btn-primary" id="adds">Add</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Todo list section -->
    <div class="row mx-1 px-5 border-bottom border-top mt-5">
        <div class="row align-items-center d-flex col-12">
            <div class="col-4 d-flex align-items-center ">
                <h3 class="px-3 mt-2 text-primary ">TASK</h3>
            </div>
            <div class="col-4">
                <h3 class="px-3 mt-2 text-primary">DATE</h3>
            </div>
            <div class="col-4 text-center ">
                <h3 class="px-3 mt-2 text-primary">ACTION</h3>
            </div>
        </div>
    </div>
    <div id="todobody">
        <div id="todoreload">
            <?php
                $datenow = date('Y-m-d');
                $query = "SELECT todolist.* from todolist WHERE DATE(date) >= '".$datenow."' and userid = '".$_SESSION['userid']."' ORDER BY date ASC";

                $q = mysqli_query($db,$query);
            
                if(mysqli_num_rows($q) > 0){
                    while($result = mysqli_fetch_array($q)){

                        echo '
                        <div class="row mx-1 px-5 pb-3">
                            <div class="row align-items-center rounded d-flex col-12">
                                <div class="col-4 d-flex align-items-center">
                                    <input type="text" id="todoname" class="form-control form-control-lg border-0 edit-todo-input bg-transparent rounded px-3" readonly disabled value="'.$result['name'].'" />
                                </div>
                                <div class="col-4">
                                    <input type="text" id="tododate" class="form-control form-control-lg border-0 edit-todo-input bg-transparent rounded px-3" readonly disabled value="'.date('F d, Y H:i a' , strtotime($result["date"])).'" />
                                </div>';
                        if($result['isComplete'] == 1){
                            echo '<div class="col-4 d-flex justify-content-center"><div class="w-50 text-center bg-info text-warning rounded-pill">Completed</div></div>';
                        }else{
                           echo '<div class="col-4 text-center ">
                                    <a href="javascript:void(0)" data = "'.$result['id'].'" id = "complete"><i class="fa fa-check text-danger btn "></i></a>
                                    <a href="javascript:void(0)" data = "'.$result['id'].'" class = "editlist"><i id="editicon" class="fa fa-pencil text-info btn"></i></a>
                                    <a href="javascript:void(0)" data = "'.$result['id'].'" id = "delete"><i class="fa fa-trash text-danger btn "></i></a>
                                </div>';
                        }
                        echo '</div>
                        </div>';
                    }
                }
            ?>
        </div>
    </div>
   
</div>
<script src="scripts/index.js"></script>
</body>
</html>