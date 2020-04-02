<?php
require '../db/dbcon.php';
require 'nav.php';
if (!isset($_SESSION['userName']))
{

    header('location:admin_login.php');
}

$sql_request_book = mysqli_query($link, "SELECT  COUNT(rolls) as count FROM issue_book WHERE username !='' AND `bid` != ''AND `approve` = '' AND `issueDate` ='' AND `returnDate` = '' AND `status` = '' AND `expand_date` = ''");

$sql_request_expand_date = mysqli_query($link, "SELECT  COUNT(rolls) as count FROM issue_book WHERE username !='' AND `bid` != ''AND `approve` != '' AND `issueDate` !='' AND `returnDate` != '' AND `status` != '' AND `expand_date` = 'Requested'");

$sql_issue_information = mysqli_query($link, "SELECT  COUNT(rolls) as count FROM issue_book WHERE  `approve` != 'Returned' AND `approve` != 'Expired'");

$sql_fine_information = mysqli_query($link, "SELECT COUNT(roll) as count FROM fine WHERE `status` = 'Not Paid'");

$sql_Books_information = mysqli_query($link, "SELECT  COUNT(*) as count FROM books WHERE bid !='' AND `name` != ''AND `author` != '' AND `edition` !='' AND `status` != '' AND `quantity` != '' AND `department` != ''");

$request_book = mysqli_fetch_assoc($sql_request_book);

$expand_date_request = mysqli_fetch_assoc($sql_request_expand_date);

$sql_issue_information = mysqli_fetch_assoc($sql_issue_information);

$sql_fine_information = mysqli_fetch_assoc($sql_fine_information);

$sql_Books_information = mysqli_fetch_assoc($sql_Books_information);

?>



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
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9">
                                    <div class="pull-right" style="font-size:30px">
                                        <?= isset($sql_issue_information['count']) ? $sql_issue_information['count'] : 0;?>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="pull-right"><span style="font-size: 15px">Total</span></div>
                                </div>
                            </div>
                        </div>
                        <a href="issue_info.php">
                            <div class="panel-footer">
                                <span class="pull-left">All Issu-Information</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9">
                                    <div class="pull-right" style="font-size:30px">
                                        <?= isset($request_book['count']) ? $request_book['count'] : 0;?>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="pull-right"><span style="font-size:15px" >Total</span></div>
                                </div>
                            </div>
                        </div>
                        <a href="request.php">
                            <div class="panel-footer">
                                <span class="pull-left">All Book Request</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9">
                                    <div class="pull-right" style="font-size:30px">
                                        <?= isset($expand_date_request['count']) ? $expand_date_request['count'] : 0;?>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="pull-right"><span style="font-size: 15px">Total</span></div>
                                </div>
                            </div>
                        </div>
                        <a href="update_returnedDate.php">
                            <div class="panel-footer">
                                <span class="pull-left">All Expanad Date request</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9">
                                    <div class="pull-right" style="font-size:30px">
                                        <?= isset($sql_fine_information['count']) ? $sql_fine_information['count'] : 0;?>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="pull-right"><span style="font-size: 15px">Total</span></div>
                                </div>
                            </div>
                        </div>
                        <a href="fine.php">
                            <div class="panel-footer">
                                <span class="pull-left">All Fine Information</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-xs-9">
                                    <div class="pull-right" style="font-size:30px">
                                        <?= isset($sql_Books_information['count']) ? $sql_Books_information['count'] : 0;?>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="pull-right"><span style="font-size: 15px">Total</span></div>
                                </div>
                            </div>
                        </div>
                        <a href="books_add.php">
                            <div class="panel-footer">
                                <span class="pull-left">New Book Add</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
         <marquee bgcolor="red" behavior="alternate"><span style="color:white; font-size: 25px;">For check All Expired Date  Go to the Issue Information Page!</span></marquee>
    </body>
</html>