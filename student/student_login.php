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
    <title>Login for Student</title>
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    
    </head>
    <style type="text/css">
        section {
            margin-top:-20px;
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
                    <li><a href="student_logOut.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                    <li><h5><?=$_SESSION['activeUser']['firstname'];?></h5></li>
                    
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
    		<div class="logo_img">
    			<div class="box1">
    				<h1 style="text-align: center;font-size:35px; font-family:lucida console;">Library Management System</h1>
    				<h1 style="text-align:center;font-size: 25px;">Student Login Form!</h1><br>
    				<form name="login" action="" method="POST">
    					<div class="login">
	    					<input class="form-control" type="text" name="username" placeholder="User Name" required=""><br><br>
	    					<input class="form-control" type="password" name="password" placeholder="password" required=""><br>
	    					<input type="submit" class="btn btn-default" name="login" value="login" style="color: black; width: 70px;height: 30px;">
    					</div>
    				</form>
    				<p style="color: white; padding-left: 15px;">
    					<br><br>
    				<a  style="text-decoration: none; margin-top: -5px;" class="btn btn-default" href="forget_password.php" style="color:black">Forgot Ur Password</a> &nbsp &nbsp &nbsp &nbsp
    				<span style="color:red;font-weight: bold; margin-left:0px; ">Are U New?</span> <a style="text-orientation: none;" class="btn btn-primary" href="registration.php" style="color :black">sign_Up</a>
						</p>
    			</div>
              <br><?php if(isset($_SESSION['info']['msg'])){
                echo '<br>'.'<div style="font-size:16px; margin-left:30%; width:50%;" class="alert alert-success col-sm-offset-1 text-center">' .$_SESSION['info']['msg']. '</div>';
                unset($_SESSION['info']);

              }  ?>
    		</div>

    	</section>
    </body>
</html>
<?php
unset($_SESSION['info']);

?>


