<?php
session_start();

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LMS</title>
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <style type="text/css">
    section {
    margin-top: -20px;
    }

    </style>
    <body>
        <?php
        if(isset($_SESSION['userName']))
            {?>
     <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand active">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
                    <a class="navbar-brand active" href="student_info.php"><i class="glyphicon glyphicon-info-sign"></i> Student_Information</a>
                    <a class="navbar-brand active" href="admin-profile.php"><i class="glyphicon glyphicon-user"></i> Profile</a>
                    <a style="margin-top: 2px;" class="navbar-brand active" href="dashbord.php"><i class="glyphicon glyphicon-dashboard"></i> Dashbord</a>
                </div>
                <ul class="nav navbar-nav navbar-right">


                  <li style="margin-top: 15px; margin-right: 5px;"><img class="img-circle" style="width:35px;height: 35px; margin-top: -9px;" src="images/<?=$_SESSION['activeUser']['user_photo'];?>"></li>
                          <li style="margin-top: 15px; color: white;"><?=$_SESSION['activeUser']['firstname'];?></li>
                    <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> HOME</a></li>
                    <li><a href="boks.php"><i class="glyphicon glyphicon-book"></i> BOOKS</a></li>
                    <li><a href="admin_logOut.php"><span class="glyphicon glyphicon-log-out"> LogOut</span></a></li>
                    <li><a href="feedback.php"><i class="glyphicon glyphicon-comment"></i> FeedBack</a></li>
                </ul>
                <!--  <ul class="nav navbar-nav navbar-right">
                    <li><a href=""><span class="glyphicon glyphicon-log-out"> LOGIN</span></a></li>
                    <li><a href=""><span class="glyphicon glyphicon-log-in"> LOGOUT</span></a></li>
                    <li><a href=""><span class="glyphicon glyphicon-user">Admin_Login</span></a></li> -->
                </div>
            </nav>
            <?php

        }else{?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand active">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> HOME</a></li>
            <li><a href="boks.php"><i class="glyphicon glyphicon-book"></i> BOOKS</a></li>
            <li><a href="admin_login.php"><span class="glyphicon glyphicon-log-out"> Sign-In</span></a></li>
            <li><a href="feedback.php"><i class="glyphicon glyphicon-comment"></i> FeedBack</a></li>
        </ul>
        <!--  <ul class="nav navbar-nav navbar-right">
            <li><a href=""><span class="glyphicon glyphicon-log-out"> LOGIN</span></a></li>
            <li><a href=""><span class="glyphicon glyphicon-log-in"> LOGOUT</span></a></li>
            <li><a href=""><span class="glyphicon glyphicon-user">Admin_Login</span></a></li> -->
        </div>
    </nav>



       <?php
        }

        ?>
                
    
        
            <section>
                <div class="img_sec">
                    <br><br><br>
                    <div class="box">
                        <br><br><br>
                        <h1 style="text-align: center; font-size: 35px;">Welcome to Library</h1><br>
                        <h1 style="text-align: center;font-size: 20px;">Opens at: 09:00 AM</h1><br>
                        <h1 style="text-align: center;font-size: 20px;">Close at: 15:00 PM</h1><br>
                    </div>
                </div>
            </section>
            
            <?php
            require'footer.php';
            ?>
        </body>
    </html>