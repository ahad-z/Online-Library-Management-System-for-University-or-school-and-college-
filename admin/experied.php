<?php
require '../db/dbcon.php';
require 'nav.php';

	if(!isset($_SESSION['userName'])){

		header('location:admin_login.php');
		}
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Information of Borrowed Book</title>
		<link href="../css/font-awesome.min.css" rel="stylesheet">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
		
	</head>
	<style type="text/css">
		/*.scroll{
			width: 100%;
			height: 100px;
			overflow: auto;
		}*/

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
                    <a href="fine.php">Fine Info</a>
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

       
		<div class="alert alert-info" style="margin-left: 400px;text-align: center; width: 500px;">
			<h5>Information of Borrowed Boook!</h5>
		</div>
		<div style= "float:right; margin-right: 10px; margin-top: -80px; width:auto; text-align:center;" class="alert alert-success">
			<h5>Update Returned status Here!</h5>
		</div>
		<form action="" method="POST">
			<button style="margin-left: 5px;" class="btn btn-success" type="submit" name="submit_return">Returned</button>
		</form>
		<form action="" method="POST">
			<button style="margin-left: 100px; margin-top: -50px;" class="btn btn-danger" type="submit" name="submit_experied">Expired</button>
		</form>
		<div class="search">
			<form style="float: right;margin-right: 50px;" class="form-group" action="" method="POST">
				<input style="width: auto; " type="text" name="stu_name" class="form-control" placeholder="Enter Student Name..." required="">
				<input style="width: auto;margin-top: 8px;" type="text" name="Stu_id" class="form-control" placeholder="Enter Student ID..." required="">
				<input style="width: auto;margin-top: 8px;" type="text" name="book_id" class="form-control" placeholder="Enter Book id..." required="">
				<button style="width: auto;margin-top: 8px;" class="btn btn-primary" name="submit">submit</button>
			</form>
		</div>
<?php
if (isset($_POST['submit'])){

  
    $stu_name = $_POST['stu_name'];
    $stu_ID = $_POST['Stu_id'];
    $Book_ID = $_POST['book_id'];

    $sql_issuebook = mysqli_query($link , "SELECT * FROM `issue_book` WHERE `username` = '$stu_name' AND `rolls` = '$stu_ID' AND `bid` = '$Book_ID'");


    while($catch_data = mysqli_fetch_assoc($sql_issuebook)){

    $return_date = strtotime($catch_data['returnDate']);

    $cureent_date = strtotime(date("Y-m-d"));

    $timeDiff = $cureent_date - $return_date;

    if($timeDiff >= 0){

    $numberOfDays = floor($timeDiff/86400);

    $penalty = $numberOfDays * 3;
    

    }

}
    $x = date("Y-m-d");


    $sql_fine = mysqli_query($link, "INSERT INTO `fine`(`username`, `bid`, `returned`, `roll`, `ammount`, `days_left`, `status`) VALUES ('$stu_name','$Book_ID','$x','$stu_ID','$penalty','$numberOfDays','Not Paid')");


    $var1 = 'Returned';

    $exper = mysqli_query($link, "UPDATE `issue_book` SET `approve`= '$var1', `status` = ''  WHERE `username` = '$stu_name' AND `rolls` = '$stu_ID' AND `bid` = '$Book_ID'");
   mysqli_query($link, "UPDATE `issue_book` SET `quantity`= quantity+1 WHERE `bid` = '$Book_ID'");

}

?>


    <?php
if (isset($_POST['submit_return']))
{

    $sql = mysqli_query($link, "SELECT issue_book.`username`,`approve`,issue_book.`rolls`, books.`bid`, books.`name` , books.`author`, books.`edition`,books.`status`, books.`quantity`, books.`department`, issue_book.issueDate, issue_book.returnDate FROM books INNER JOIN issue_book ON books.bid = issue_book.bid WHERE issue_book.approve = 'Returned'");

    echo "<table class='table table-bordered table-hover'>";
    // echo "<div class ='scroll'>";
    echo "<tr style = 'background-color:#34a29b;'>";

    echo "<th>";
    echo "Student Name";
    echo "</th>";
    echo "<th>";
    echo "Student ID";
    echo "</th>";
    echo "<th>";
    echo "Book-ID";
    echo "</th>";
    echo "<th>";
    echo "Book Name";
    echo "</th>";
    echo "<th>";
    echo "Author Name";
    echo "</th>";
    echo "<th>";
    echo "edition";
    echo "</th>";
    echo "<th>";
    echo "Approve";
    echo "</th>";
    echo "<th>";
    echo "Issue Date";
    echo "</th>";
    echo "<th>";
    echo "return Date";
    echo "</th>";

    echo "</tr>";
    // echo "</table>";
    // echo "<div class ='scroll'>";
    // echo "<table class='table table-bordered table-hover'>";
    while ($row = mysqli_fetch_assoc($sql))
    {

        echo "<tr>";
            echo "<td>";
            echo $row['username'];
            echo "</td>";
            echo "<td>";
            echo $row['rolls'];
            echo "</td>";
            echo "<td>";
            echo $row['bid'];
            echo "</td>";
            echo "<td>";
            echo $row['name'];
            echo "</td>";
            echo "<td>";
            echo $row['author'];
            echo "</td>";
            echo "<td>";
            echo $row['edition'];
            echo "</td>";
            echo "<td style='color: white ; background-color:#116530'>";
            echo $row['approve'];
            echo "</td>";
            echo "<td>";
            echo $row['issueDate'];
            echo "</td>";
            echo "<td>";
            echo $row['returnDate'];
            echo "</td>";
        echo "</tr>";
    }
}
elseif (isset($_POST['submit_experied']))
{

    $sql = mysqli_query($link, "SELECT issue_book.`username`,`approve`,issue_book.`rolls`, books.`bid`, books.`name` , books.`author`, books.`edition`,books.`status`, books.`quantity`, books.`department`, issue_book.issueDate, issue_book.returnDate FROM books INNER JOIN issue_book ON books.bid = issue_book.bid WHERE issue_book.approve = 'Expired'");
    echo "<table class='table table-bordered table-hover'>";
    // echo "<div class ='scroll'>";
    echo "<tr style = 'background-color:#34a29b;'>";

    echo "<th>";
    echo "Student Name";
    echo "</th>";
    echo "<th>";
    echo "Student ID";
    echo "</th>";
    echo "<th>";
    echo "Book-ID";
    echo "</th>";
    echo "<th>";
    echo "Book Name";
    echo "</th>";
    echo "<th>";
    echo "Author Name";
    echo "</th>";
    echo "<th>";
    echo "edition";
    echo "</th>";
    echo "<th>";
    echo "Approve";
    echo "</th>";
    echo "<th>";
    echo "Issue Date";
    echo "</th>";
    echo "<th>";
    echo "return Date";
    echo "</th>";

    echo "</tr>";
    // echo "</table>";
    // echo "<div class ='scroll'>";
    // echo "<table class='table table-bordered table-hover'>";
    while ($row = mysqli_fetch_assoc($sql))
    {
        $_SESSION['old_fine'] = [

        'returnDate' => $row['returnDate'],
        
        ];

        echo "<tr>";

        echo "<td>";
        echo $row['username'];
        echo "</td>";
        echo "<td>";
        echo $row['rolls'];
        echo "</td>";
        echo "<td>";
        echo $row['bid'];
        echo "</td>";
        echo "<td>";
        echo $row['name'];
        echo "</td>";
        echo "<td>";
        echo $row['author'];
        echo "</td>";
        echo "<td>";
        echo $row['edition'];
        echo "</td>";
        echo "<td style='color: red ; background-color:#116530'>";
        echo $row['approve'];
        echo "</td>";
        echo "<td>";
        echo $row['issueDate'];
        echo "</td>";
        echo "<td>";
        echo $row['returnDate'];
        echo "</td>";

        echo "</tr>";
    }
}

else
{

    $sql = mysqli_query($link, "SELECT issue_book.`username`,`approve`,issue_book.`rolls`, books.`bid`, books.`name` , books.`author`, books.`edition`,books.`status`, books.`quantity`, books.`department`, issue_book.issueDate, issue_book.returnDate FROM books INNER JOIN issue_book ON books.bid = issue_book.bid WHERE issue_book.approve != '' AND issue_book.approve != 'Yeas'");

    echo "<table class='table table-bordered table-hover'>";
    // echo "<div class ='scroll'>";
    echo "<tr style = 'background-color:#34a29b;'>";

    echo "<th>";
    echo "Student Name";
    echo "</th>";
    echo "<th>";
    echo "Student ID";
    echo "</th>";
    echo "<th>";
    echo "Book-ID";
    echo "</th>";
    echo "<th>";
    echo "Book Name";
    echo "</th>";
    echo "<th>";
    echo "Author Name";
    echo "</th>";
    echo "<th>";
    echo "edition";
    echo "</th>";
    echo "<th>";
    echo "Approve";
    echo "</th>";
    echo "<th>";
    echo "Issue Date";
    echo "</th>";
    echo "<th>";
    echo "return Date";
    echo "</th>";

    echo "</tr>";
    // echo "</table>";
    // echo "<div class ='scroll'>";
    // echo "<table class='table table-bordered table-hover'>";
    while ($row = mysqli_fetch_assoc($sql))
    {

        echo "<tr>";

        echo "<td>";
        echo $row['username'];
        echo "</td>";
        echo "<td>";
        echo $row['rolls'];
        echo "</td>";
        echo "<td>";
        echo $row['bid'];
        echo "</td>";
        echo "<td>";
        echo $row['name'];
        echo "</td>";
        echo "<td>";
        echo $row['author'];
        echo "</td>";
        echo "<td>";
        echo $row['edition'];
        echo "</td>";
        echo "<td>";
        echo $row['approve'];
        echo "</td>";
        echo "<td>";
        echo $row['issueDate'];
        echo "</td>";
        echo "<td>";
        echo $row['returnDate'];
        echo "</td>";

        echo "</tr>";
    }

    echo "</table>";


}




   

    
?>


</div>

</body>
</html>
