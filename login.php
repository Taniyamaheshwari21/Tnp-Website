<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnectt.php';
    $login_id = $_POST["login_id"];
    $password = $_POST["password"]; 
    
     
    $sql = "Select * from stu_login where stu_id='$login_id' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['stu_id'] = $stu_id;
        header("location: home.php");

    } 
    else{$sql = "Select * from comp_login where comp_id='$login_id' AND cpassword='$password'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['stu_id'] = $stu_id;
            header("location: comphome.php");
        }
        else{
        $showError = "Invalid Credentials";
        }
    }
}
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="ladoo.css">
    <title>Login</title>
  </head>
  <body style="">
    <?php require 'navbar.php'?>
    <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>
    <br>
    <br>
    <br>
    <div class="container my-4">
     <h1 class="text-center">Login to our website</h1>
     <form action="/dbms/login.php" method="post">
        <div class="form-group">
            <label for="login_id">Login id</label>
            <input type="text" class="form-control" id="login_id" name="login_id" aria-describedby="emailHelp">
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
       
         
        <button type="submit" class="btn btn-primary">Login</button>
     </form>
    </div>

    
    
  </body>
</html>
