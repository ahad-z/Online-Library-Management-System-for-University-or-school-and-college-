<?php
require '../db/dbcon.php';
require 'nav.php';
require 'action_student.php';
if(!isset($_SESSION['userName'])){
	
	header('location:student_login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
	 <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <style>
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
			h4{
				margin-bottom: 5px;
				text-align: center;
				font-style: italic;
				font-size: 30px;
				color: gray;
			}
			.search{
				padding-left: 1000px;
			}
		</style>
</head>
<body>
	<?php
	if(isset($_SESSION['book_msg'])){
			
			echo '<div style= "margin-left:500px; width:500px;text-align:center;" class="alert alert-info" >' . $_SESSION['book_msg'].'</div>';
			unset($_SESSION['book_msg']);
			
		}

	?>
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
		<a href="student-profile.php">Profile</a>
		<a href="boks.php">Books</a>
		<a href="request.php">Book Request</a>
		<a href="issu_info.php">Issue Information</a>
	
</div>
				
			<div id="main">

				<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

				<script>

					function openNav() {

					document.getElementById("mySidenav").style.left = "0";
				
					document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
				}

				function closeNav() {
				document.getElementById("mySidenav").style.left = "-300px";
				document.body.style.backgroundColor = "white";
					}
			</script>

			<?php

				if(isset($_SESSION['userName'])){

					 $use_name =$_SESSION['activeUser']['firstname'];
					 $userRoll =$_SESSION['activeUser']['roll'];

					$reqs_book = mysqli_query($link, "SELECT * FROM `issue_book` WHERE `username` = '$use_name' AND `rolls` = '$userRoll'");

					if(mysqli_num_rows($reqs_book) == 0){

						$_SESSION['book_msg'] = "There is no Pending Request!";

					}else{
					echo "<table class='table table-bordered table-hover'>";
					echo "<tr style = 'background-color:#34a29b;'>";
					echo "<th>"; echo "Book-ID"; echo "</th>";
					echo "<th>"; echo "Approve Status"; echo "</th>";
					echo "<th>"; echo "Rerquest Date"; echo "</th>";
					echo "<th>"; echo "Return Date"; echo "</th>";
				echo "</tr>";
				while ($row = mysqli_fetch_assoc($reqs_book)) {
					echo "<tr>";
						echo "<td>"; echo $row['bid']; echo "</td>";
						echo "<td>"; echo $row['approve']; echo "</td>";
						echo "<td>"; echo $row['issueDate']; echo "</td>";
						echo "<td>"; echo $row['returnDate']; echo "</td>";
					echo "</tr>";
				}
			echo "</table>";

	}
}
			?>



</body>
</html>