<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="ladoo.css">
    <title>User Logout</title>
</head>
<body>
<?php require 'navbar.php' ?>
<div class="logout">
    <h2> Logout </h2>
    <p>Click the button below to logout:</p>
    <form action="logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
</div>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        session_unset();
        session_destroy();
        echo "You have been logged out. <a href='login.php'>Click here to login</a>";
        header("location: login.php");
        exit;
    }
    
    ?>
</body>
</html>
