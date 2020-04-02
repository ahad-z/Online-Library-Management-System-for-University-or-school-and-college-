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
<body>
 <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand active">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
            </div>
            <?php

                    if(isset($_SESSION['userName'])){?>
                        <ul class="nav navbar-nav navbar-right">
                          <li style="margin-top: 15px; margin-right: 5px;"><img class="img-circle" style="width:35px;height: 35px; margin-top: -9px;" src="images/<?=$_SESSION['activeUser']['user_photo'];?>"></li>
                          <li style="margin-top: 15px; color: white;"><?=$_SESSION['activeUser']['firstname'];?></li>
                            <li><a href="index.php"><i class="fa fa-home"></i> HOME</a></li>
                            <li><a href="boks.php"><i class="fa fa-book"></i> BOOKS</a></li>
                            <li><a href="admin_logOut.php"><span class="glyphicon glyphicon-log-out"> Log-Out</span></a></li>
                             <li><a href="feedback.php"><i class="fa fa-comment"></i> FeedBack</a></li>
                        </ul>
                        <?php
                    }else{?>

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php"><i class="fa fa-home"></i> HOME</a></li>
                            <li><a href="boks.php"><i class="fa fa-book"></i> BOOKS</a></li>
                            <li><a href="admin_login.php"><span class="glyphicon glyphicon-log-in"> Admin_Login</span></a></li>
                            <li><a href="feedback.php"><i class="fa fa-comment"></i> FeedBack</a></li>
            </ul>

            <?php 

                }

            ?>
            <!--  <ul class="nav navbar-nav navbar-right">

            <li><a href=""><span class="glyphicon glyphicon-log-out"> LOGIN</span></a></li>
            <li><a href=""><span class="glyphicon glyphicon-log-in"> LOGOUT</span></a></li>
            <li><a href=""><span class="glyphicon glyphicon-user">Admin_Login</span></a></li> -->
                    
        </div>
    </nav>