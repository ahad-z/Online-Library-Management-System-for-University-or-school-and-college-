<?php
session_start();
require'../db/dbcon.php';
require 'action_student.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Registration</title>
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        
        
    </head>
    
    <style type="text/css">
    section {
    margin-top:-20px;
        height: 1000px;
        width: auto;
        background-color: #085577; 

    }
    .error{
    color:#6e96b5;
    font-style: italic;
    font-weight: 700;
    }
    </style>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand active">Online Library Management System</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="boks.php">Books</a></li>
                    <li><a href="feedback.php">Feedback</a></li>
                </ul>
                <?php
                    if(isset($_SESSION['userName'])){?>
                        <ul class="nav navbar-nav navbar-right">
                       <li style="margin-top: 15px"><img class="img-circle" style="width:35px;height: 35px; margin-top: -9px;" src="../images/<?=$_SESSION['activeUser']['user_photo'];?>"> <?=$_SESSION['activeUser']['firstname'];?> </li>
                    
                    <li><a href="student_logOut.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                    
                </ul>
                    <?php
                    }else
                    {
                        ?>
                         <ul class="nav navbar-nav navbar-right">
                    <li><a href="student_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                    
                    <li><a href="registration.php"><span class="glyphicon glyphicon-user"> Sign_Up</span></a></li>
                </ul>
                <?php
                    }
        

                 ?>
            </div>
        </nav>
        <section>
            
                <div class="box2">  
                    <h1 style="text-align: center;font-size:35px; font-family:lucida console;">Library Management System</h1>
                    <h1 style="text-align:center;font-size: 25px;">Student Registration Form!</h1><br>
                    <?php
                    if(isset($_SESSION['msg']['insert'])){
                        echo '<br>'.'<div style="font-size:16px;" class="alert alert-success col-sm-offset-1 text-center">' .$_SESSION['msg']['insert'].'</div>';
                        unset($_SESSION['msg']['insert']);
                    }
                    ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="login">
                            <div class="form-group">
                                <input class="form-control" type="text" name="firstname" placeholder="Enter ur Firstname" value="<?php if(isset($_SESSION['old']['firstname'])){
                                echo $_SESSION['old']['firstname'];
                                }?>">
                                <label class="error">
                                    <?php
                                    if(isset($_SESSION['validation']['firstname']))
                                    {
                                    echo $_SESSION['validation']['firstname'];
                                    }
                                    ?>
                                </label>
                                <label class="error">
                                    <?php
                                    if(isset($_SESSION['validation']['error_firstname'])){
                                    echo $_SESSION['validation']['error_firstname'];
                                    }
                                    ?>
                                </label>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="lastname" placeholder="Enter ur Lastname" value="<?php if(isset($_SESSION['old']['lastname'])){
                                echo $_SESSION['old']['lastname'];
                                }?>">
                                <label class="error">
                                    <?php
                                    if(isset($_SESSION['validation']['lastname']))
                                    {
                                    echo $_SESSION['validation']['lastname'];
                                    }
                                    ?>
                                </label>
                                <label class="error">
                                    <?php
                                    if(isset($_SESSION['validation']['error_lasstname']))
                                    {
                                    echo $_SESSION['validation']['error_lasstname'];
                                    }
                                    ?>
                                </label>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="username" placeholder="Enter ur User Name" value="<?php if(isset($_SESSION['old']['username'])){
                                echo $_SESSION['old']['username'];
                                }?>">
                                <label class="error">
                                    <?php
                                    if(isset($_SESSION['validation']['username']))
                                    {
                                    echo $_SESSION['validation']['username'];
                                    }
                                    ?>
                                </label>
                                <label class="error">
                                    <?php
                                    if(isset($_SESSION['validation']['error_user_name']))
                                    {
                                    echo $_SESSION['validation']['error_user_name'];
                                    }
                                    ?>
                                </label>
                                <label class="error">
                                    <?php
                                    if(isset($_SESSION['validation']['user_name_check_msg']))
                                    {
                                    echo $_SESSION['validation']['user_name_check_msg'];
                                    }
                                    ?>
                                </label>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" placeholder="password" value="<?php if(isset($_SESSION['old']['password'])){
                                echo $_SESSION['old']['password'];
                                }?>">
                                <label class="error">
                                    <?php
                                    if(isset($_SESSION['validation']['password']))
                                    {
                                    echo $_SESSION['validation']['password'];
                                    }
                                    ?>
                                </label>
                                <label class="error">
                                    <?php
                                    if(isset($_SESSION['validation']['error_password']))
                                    {
                                    echo $_SESSION['validation']['error_password'];
                                    }
                                    ?>
                                </label>
                                <label class="error">
                                    <?php
                                    if(isset($_SESSION['validation']['password_length']))
                                    {
                                    echo $_SESSION['validation']['password_length'];
                                    }
                                    ?>
                                </label>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="c_password" placeholder="Re_Type password" value="<?php if(isset($_SESSION['old']['c_password'])){
                                echo $_SESSION['old']['c_password'];
                                }?>">
                                <label class="error">
                                    <?php
                                    if(isset($_SESSION['validation']['c_password']))
                                    {
                                    echo $_SESSION['validation']['c_password'];
                                    }
                                    ?>
                                </label>
                                <label class="error">
                                    <?php
                                    if(isset($_SESSION['validation']['password_match']))
                                    {
                                    echo $_SESSION['validation']['password_match'];
                                    }
                                    ?>
                                </label>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="roll" placeholder="Enter ur ID" value="<?php if(isset($_SESSION['old']['roll'])){
                                echo $_SESSION['old']['roll'];
                                }?>">
                                <label class="error">
                                    <?php
                                    if(isset($_SESSION['validation']['roll']))
                                    {
                                    echo $_SESSION['validation']['roll'];
                                    }
                                    ?>
                                </label>
                                <label class="error">
                                    <?php
                                    if(isset($_SESSION['validation']['error_number']))
                                    {
                                    echo $_SESSION['validation']['error_number'];
                                    }
                                    ?>
                                </label>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="email" placeholder="Enter ur Email" value="<?php if(isset($_SESSION['old']['email'])){
                                echo $_SESSION['old']['email'];
                                }?>">
                                <label class="error">
                                    <?php
                                    if(isset($_SESSION['validation']['email']))
                                    {
                                    echo $_SESSION['validation']['email'];
                                    }
                                    ?>
                                </label>
                                <label class="error">
                                    <?php
                                    if(isset($_SESSION['validation']['error_email']))
                                    {
                                    echo $_SESSION['validation']['error_email'];
                                    }
                                    ?>
                                </label>
                                <label class="error">
                                    <?php
                                    if(isset($_SESSION['validation']['email_check_msg']))
                                    {
                                    echo $_SESSION['validation']['email_check_msg'];
                                    }
                                    ?>
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="file" name="photo" />
                                <label class="error">
                                    <?php

                                    if (isset($_SESSION['validation']['photo'])) {

                             echo  $_SESSION['validation']['photo'];
                                        
                                    }
                                    
                                ?>
                                </label>
                                <label class="error">
                                    <?php
                                    if(isset($_SESSION['validation'] ['photo_formate'])){
                                        echo $_SESSION['validation'] ['photo_formate'];
                                    }

                                    ?>
                                </label>
                                <label class="error">
                                    <?php
                                    if(isset($_SESSION['validation'] ['photo_size'])){
                                        echo $_SESSION['validation'] ['photo_size'];
                                    }



                                    ?>
                                    
                                </label>
                            </div>
                            <input type="submit" name="submit_student" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            
        </section>
    </body>
</html>
<?php
unset($_SESSION['validation']);
unset($_SESSION['old']);
?>