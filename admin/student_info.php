<?php
require '../db/dbcon.php';
require 'nav.php';
if(!isset($_SESSION['userName'])){
    header('location:admin_login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMS</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/script.js"></script>
    </head>
    <style type="text/css">
             body {
        font-family: "Lato", sans-serif;
        transition: background-color .5s;
        }
        .sidenav {
        margin-top: 52px;
        height: 100%;
        width: 300px;
        position: absolute;
        z-index: 1;
        top: 0;
        left: -300px;
        background-color: #222222;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
        }
        .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
        }
        .sidenav a:hover {
        /*color: #f1f1f1;*/
        color:green;
        }
        .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
        
        }
        #main {
        transition: margin-left .5s;
        padding: 16px;
        }
        @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
        }
        
    </style>
    <body>
        <div id="mySidenav" class="sidenav">

                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    
                    <div>
                        <?php
                        if(isset($_SESSION['userName'])){
                            ?>
                            <img style="width:100px;height:100px; margin-left: 100px;"  src="./images/<?=$_SESSION['activeUser']['user_photo'];?>" alt="User-img" class=" img-circle img-responsive" />
                    <h5 style="margin-left:70px; color: white;" class="font">Welcome : <?=$_SESSION['activeUser']['firstname'];?></h5>
                    
                        <?php
                    }
                        ?>
                        
                    </div>
                    <a href="request.php">Book Request</a>
                    <a href="issue_info.php">Issue Information</a>
                    <a href="admin-profile.php">Profile</a>
                    <a href="boks.php">Books</a>
                    <a href="experied.php">Experied List</a>
                    <a href="fine.php">Experied List</a>
                    <a href="books_add.php">Book Add</a>
                     <a href="update_returnedDate.php">Request Expand Date</a>
                    
                </div>
                
            <div id="main">
                <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

            <script>
            function openNav() {

                document.getElementById("mySidenav").style.left = "0";
                // document.getElementById("main").style.marginLeft = "300px";
                document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
            }
            function closeNav() {

                document.getElementById("mySidenav").style.left = "-300px";
                // document.getElementById("main").style.marginLeft= "0";
                document.body.style.backgroundColor = "white";
            }
            </script>
        <div class="table-responsive">
            <table id="data" class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>UserName</th>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Photo</th>
                    </tr>
                </thead>
                <tbody>
                     <?php

                     $result = mysqli_query($link, "SELECT * FROM `student_info`");
                     while ($row = mysqli_fetch_assoc($result)) {?>
                    
                    
                    <tr>
                        <td>
                           <?= $row['firstname'];?>
                                            
                        </td>
                        <td>
                           <?= $row['lastname'];?>
                            
                        </td>
                        <td>
                            <?=$row['username'];?>                
                            
                        </td>
                        <td>
                            <?=$row['roll'];?>                
                        </td>
                        <td>
                            <?=$row['email'];?>                        
                        </td>
                        <td style="text-align: center;">
                        <img style="width:25%; " src="../student/images/<?= $row['photo']?>" alt = "img">
            
                        </td>
                    </tr>
                    <?php
                }
                    ?>
                   
                    
                </tbody>
            </table>
        </div>
    </div>
    </body>
</html>