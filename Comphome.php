<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
$Company = 'root';
$password = '';
 
// Database name is geeksforgeeks
$database = 'dbms';
$server= "localhost";
$mysqli = new mysqli($server,$Company,
                $password, $database);
 
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
$sql = " SELECT * FROM applied ";
$result = $mysqli->query($sql);
?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit&family=Mukta:wght@500&family=Open+Sans&family=Playfair+Display:wght@500;600&family=Roboto+Condensed&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="ladoo.css">
    <title>Homepage</title>
  </head>
  <body>
    <?php require 'navbar.php' ?>
    <div class="yolo">
    <h1>WELCOME!</h1>
    <h4>This is the list of students that have currently applied to your company </h4>
    </div>
    <div id="ecom">
        <br>
        <?php 

$sql = " SELECT * FROM applied";
$result = $mysqli->query($sql);
//$mysqli->close();

?>
<div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                    <form method="post" action="home.php">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <td> Student ID </td>
                                <td> Company ID </td>
                                <td> CGPA </td>
                            </tr>
                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        
                                        $StudentID = $row['stu_id'];
                                        $CompID = $row['comp_id'];
                                        $cgpa = $row['stu_cg'];
                            ?>
                            <tr>
                                        <td><?php echo $StudentID ?></td>
                                        <td><?php echo $CompID ?></td>
                                        <td><?php echo $cgpa ?></td>
                                    </tr>        
                            <?php 
                                }
                                
                            ?>
                            </table>
    </body>
</html>
