<?php
require '../db/dbcon.php';
require 'nav.php';
if(!isset($_SESSION['userName'])){
	header('location:admin_login.php');
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Fine List of Student</title>
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

<div class="alert alert-info" style="margin-left: 400px;text-align: center; width: 500px; color: gray; font-style: italic; font-size: 20px;">
	<h5>Information of Fine Status!</h5>
</div>
<div style= "float:right; margin-right: 10px; margin-top: -80px; width:250px; text-align:center;border-radius:50%;color: gray;" class="alert alert-success">
	<h5>Update fine status!</h5>
</div>
<div class="search">
	<form style="float: right;margin-right: 50px;" class="form-group" action="" method="POST">
		<input style="width: auto; " type="text" name="stu_name" class="form-control" placeholder="Enter Student Name..." required="">
		<input style="width: auto;margin-top: 8px;" type="text" name="Stu_id" class="form-control" placeholder="Enter Student ID..." required="">
		<input style="width: auto;margin-top: 8px;" type="text" name="book_id" class="form-control" placeholder="Enter Book id..." required="">
		<button style="width: auto;margin-top: 8px;" class="btn btn-primary" name="submit_paid">submit</button>
	</form>
</div>

<?php
//if(isset($_SESSION['msg'])){?>

<!-- <div class="alert alert-info" style="margin-left: 400px;text-align: center; width: 500px; color: gray; font-style: italic; font-size: 20px;"> -->
	<?php
	//echo $_SESSION['msg'];

?>

<!-- </div> -->
<?php
//unset($_SESSION['msg']);
//}
?>


	<?php

	if(isset($_POST['submit_paid'])){

	$stu_name = $_POST['stu_name'];
    $stu_ID = $_POST['Stu_id'];
    $Book_ID = $_POST['book_id'];


    $update_fine_status = mysqli_query($link, "UPDATE `fine` SET `status`='Paid' WHERE `username` = '$stu_name' AND `bid` = '$Book_ID' AND `roll` = '$stu_ID'");

    if($update_fine_status){

    	// $_SESSION['msg'] = "Paid Information Updated!";
    }


	}

	$fine_data = mysqli_query($link, "SELECT * FROM `fine`");

	echo "<table class = 'table table-bordered table-hover'>";

			echo "<tr style ='background-color:#34a29b;'>";
				 echo "<th>";
				 echo "Student Name"; 
				 echo "</th>";
				 echo "<th>" ;
				 echo "Student ID"; 
				 echo "</th>";
				 echo "<th>" ;
				 echo "Book Id"; 
				 echo "</th>";
				 echo "<th>"; 
				 echo "Returnd Date";
				 echo "</th>";
				 echo "<th>" ;
				 echo "Ammount of Fine"; 
				 echo "</th>";
				 echo "<th>" ;
				 echo "Days Left"; 
				 echo "</th>";
				 echo "<th>" ;
				 echo "Payment Status"; 
				 echo "</th>";
			  echo "</tr>";

			 while($row = mysqli_fetch_assoc($fine_data)){

			 	echo "<tr>";

			 		echo "<td>";
			 			echo $row['username'];
			 		echo "</td>";
			 		echo "<td>";
			 			echo $row['roll'];
			 		echo "</td>";
			 		echo "<td>";
			 			echo $row['bid'];
			 		echo "</td>";
			 		echo "<td>";
			 			echo $row['returned'];
			 		echo "</td>";
			 		echo "<td>";
			 			echo $row['ammount'];
			 		echo "</td>";
			 		echo "<td>";
			 			echo $row['days_left'];
			 		echo "</td>";
			 		echo "<td>";
			 			echo $row['status'];
			 		echo "</td>";
	
			 	echo "</tr>";



			 }




	?>


	

</div>

</body>
</html>
