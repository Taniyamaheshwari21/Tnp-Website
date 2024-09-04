<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
// Companyname is root
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
$sql = " SELECT * FROM stu_info";
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

<div class="yel">
    <h1></h1>
    <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#wow">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#ecom">Placement History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#ecom">Eligible companies</a>
        </li>
      </ul>
</div>
<section class="bg-light" style="padding-top: 90px;">
    <div class="container">
        <div class="row">
        <div class="col-lg-12 mb-4 mb-sm-5">
                <div>
                    <span class="section-title text-primary mb-3 mb-sm-4">About Tnp</span>
                    <p>Practical Training is a very important component of the curriculum. As a part of the curriculum, arrangements are made for the students to undergo practical training during winter and summer vacations in Multinational/Private/Public Sector Undertakings/Government Department and Foreign Universities. Some of the prominent industrial organizations in which NSUT Students have completed Internships include Microsoft, Amazon, Bharat Petroleum Corporation Limited, Engineers India Limited, Airport Authority of India, etc.</p>
                    <p class="mb-0">Campus Recruitment Programme conducted by the Institute is very vital and crucial for theyoung engineers aspiring for appropriate placement in Government Departments, Multi-National Companies, Public Sector Undertakings etc.

                    A close interaction between the Institute and various company executives has created excellentplacement record. The Students Placement Coordinators actively participate in organizing Campus Recruitment Programme.

                    On the basis of records available, almost all the students who graduated in current year havesecured jobs either in in Multinational companies, Private and Public Sector Undertakings and Government Departments with many students being offered multiple jobs. Some of our students have been selected at various reputed B-Schools of India.

                    So far a high percentage of our eligible students have been offered jobs by reputed firms.</p>
                </div>
            </div>
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="row align-items-center">
                        <?php 
                        // LOOP TILL END OF DATA
                        $rows=$result->fetch_assoc()
                        
                        ?>
                            <div class="col-lg-6 px-xl-10" id="wow">
                                <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                    <h3 class="h2 text-white mb-0"><?php echo $rows['stu_name'];?></h3>
                                    <span class="text-primary"><?php echo $rows['stu_id'];
                                    $yo=$rows['stu_id']?></span>
                                </div>
                                <ul class="list-unstyled mb-1-9">
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">DOB:</span> <?php echo $rows['dob'];?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Branch:</span> <?php echo $rows['branch'];?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Section:</span><?php echo $rows['section'];?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">CGPA:</span><?php echo $rows['stu_cg'];?></li>
                                    <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Phone:</span> <?php echo $rows['phone_no'];?></li>
                                    <br>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Email:</span> <?php echo $rows['email'];?></li>
                                    
                                </ul>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            
                
        </div>
    </div>
</section>
    <div id="history">
        <h1>Company Placement History</h1>
        <br>
        <?php 

$sql = " SELECT * FROM comp_history ";
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
                                <td> Company ID </td>
                                <td> 2020 </td>
                                <td> 2021 </td>
                                <td> 2022  </td>
                            </tr>
                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $CompID = $row['comp_id'];
                                        $y1 = $row['2020'];
                                        $y2 = $row['2021'];
                                        $y3=$row['2022'];
                            ?>
                            <tr>
                                        <td><?php echo $CompID ?></td>
                                        <td><?php echo $y1 ?></td>
                                        <td><?php echo $y2 ?></td>
                                        <td><?php echo $y3 ?></td>
                                    </tr>        
                            <?php 
                                }
                                
                            ?>
                            </table>
                            </form>
                    </div>
                </div>
            </div>
        </div>             
    </div>
    <br>
<hr>
<br>
 <div id="ecom">
        <h1>Eligble Companies List</h1>
        <br>
        <?php 

$sql = " SELECT * FROM comp_info,stu_info WHERE stu_cg>=cg_req AND stu_id='$yo'";
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
                                <td> Company ID </td>
                                <td> Company Name </td>
                                <td> Location </td>
                                <td> Apply  </td>
                            </tr>
                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $CompID = $row['comp_id'];
                                        $CompanyName = $row['comp_name'];
                                        $Location = $row['location'];
                                        $cg=$row['stu_cg'];
                                        $STUID=$row['stu_id'];
                            ?>
                            <tr>
                                        <td><?php echo $CompID ?></td>
                                        <td><?php echo $CompanyName ?></td>
                                        <td><?php echo $Location ?></td>
                                        <td><button type="submit" name="Apply_Now" value="<?php echo $CompID; ?>">Apply Now</button></td>
                                    </tr>        
                            <?php 
                                }
                                
                            ?>
                            </table>
                            </form>
                    </div>
                </div>
            </div>
        </div>             
    </div>
    <?php
if (isset($_POST['Apply_Now'])) {
    $selectedCompID = $_POST['Apply_Now'];
    $sql = "INSERT INTO `applied` (`stu_id`, `comp_id`, `stu_cg`) VALUES ('$STUID', '$selectedCompID', $cg)";
    $result = $mysqli->query($sql);
    if ($result) {
        $showAlert = true;
    } else {
        $showError = "Failed to apply";
    }
    $mysqli->close();
}
?>
    <script src="ugh.js"></script>
    </body>
</html>
