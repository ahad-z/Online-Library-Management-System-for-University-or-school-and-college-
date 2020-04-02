<?php
session_start();
require'../db/dbcon.php';
require 'action_admin.php';
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
                
                
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="student_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                    
                    <li><a href="registration.php"><span class="glyphicon glyphicon-user"> Sign_Up</span></a></li>
                </ul>
                
                
            </div>
        </nav>
        <section>
            <div class="forget-img">
                <div class="box-log">
                    <h1 style="text-align: center;font-size:35px; font-family:lucida console;">Library Management System</h1>
                    <h1 style="text-align:center;font-size: 25px;">Student Login Form!</h1><br>
                    <form action="" method="POST">
                        <div class="login">
                            <div class="form-group">
                                <input class="form-control" type="text" name="username" placeholder="User Name" required="" value= "<?php 

                              if(isset($_SESSION['updateOld']['username'])){

                                    echo $_SESSION['updateOld']['username'];
                                }
                                unset($_SESSION['updateOld']['username']);
                             ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="email" placeholder="Enter Your Email" required="" value="<?php 
                                if(isset($_SESSION['updateOld']['email'])){

                                    echo $_SESSION['updateOld']['email'];
                                }
                                unset($_SESSION['updateOld']['email']);
                                ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" placeholder="Enter Your New password" required="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password_new" placeholder="Re-Type password" required="">
                            </div>
                            <input type="submit" class="btn btn-default" name="update" value="Update" style="color: black; width: 70px;height: 30px;">
                        </div>
                    </form>
                    
                </div>
                <br>
                <?php
                     if(isset($_SESSION['update-msg'])){

                        echo '<br>'.'<div style="font-size:16px; margin-left:30%; width:50%;" class="alert alert-success col-sm-offset-1 text-center">' .$_SESSION['update-msg']. '</div>';
                        unset($_SESSION['info']);

              }  ?>

            </div>
        </section>
    </body>
</html>
<?php
unset($_SESSION['updateOld']);
unset($_SESSION['update-msg']);

?>