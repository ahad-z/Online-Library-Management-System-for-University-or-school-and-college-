<?php
require '../db/dbcon.php';
require 'nav.php';
require 'action_student.php';

if(!isset($_SESSION['userName'])){
    header("location:student_login.php");
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        
    </head>
    <style type="text/css">
    body{
    padding-top:0px;
    background-color: gray;
    }
    .glyphicon {
    margin-bottom: 10px;
    margin-right: 10px;
    }
    small {
    display: block;
    line-height: 1.428571429;
    color: #999;
    }
    </style>
    <body>

        <div class="container" style="margin-top: 50px;">
            <div class="row">
                <div class="col-md-offset-4 col-md-6">
                    <div class="well well-sm">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <img style="" src="./images/<?=$_SESSION['activeUser']['user_photo'];?>" alt="User-img" class=" img-rounded img-responsive" />
                            </div>
                            <div class="col-md-8">
                                <h4 class="font"><?=$_SESSION['activeUser']['firstname'];?></h4>
                                <small><cite class="font" title="">Dhaka<i class="glyphicon glyphicon-map-marker">
                                </i></cite></small>
                                <p class="font"><i class="fa fa-envelope"></i> <?=$_SESSION['activeUser']['email'];?></p>
                                <p class="font"><i class="fa fa-id-badge" aria-hidden="true"></i> <?=$_SESSION['activeUser']['roll'];?></p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>