<?php
require '../db/dbcon.php';
require 'nav.php';
require 'action_student.php';
	// if(!isset($_SESSION['userName']))
	// {
	// 	header('location:student_login.php');
	// }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Books</title>
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
		
		if(isset($_SESSION['reqMesage'])){
			
			echo '<div style= "margin-left:500px; width:500px;text-align:center;" class="alert alert-info" >' . $_SESSION['reqMesage'] .'</div>';
			unset($_SESSION['reqMesage']);
			
		}
	
	
		?>
		<!-- <h5 style="margin-left: 500px;">Ahad</h5> -->
		
<!-- 		...............................Side nav Start From here!................ -->
			<div id="mySidenav" class="sidenav">

					<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
					
					<div>
						<?php
						if(isset($_SESSION['userName'])){
							?>
							<img style="width:100px;height:100px; margin-left: 100px;"  src="./images/<?=$_SESSION['activeUser']['user_photo'];?>" alt="User-img" class=" img-circle img-responsive" />
					<h5 style="margin-left:70px; color: white;" class="font">Welcome : <?=$_SESSION['activeUser']['firstname'];?></h5>
					<a href="request.php">Book Request</a>
					<a href="issu_info.php">Issue Information</a>
						<?php
					}
						?>
					
						
						
					</div>


					<a href="student-profile.php">Profile</a>
					<a href="boks.php">Books</a>
					
					
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

		<!-- .....................Request  Book Start From here......... -->
	
<div class="search">
	<form action="" method="POST" class="navbar-form">

		<input type="hidden" name="cureent_usernmae" value="<?=$_SESSION['activeUser']['firstname'];?>">
		<input type="hidden" name="cureent_roll" value="<?=$_SESSION['activeUser']['roll'];?>">
		<input type="text" name="book_id" placeholder="Enter Book ID..." class="form-control" required="">
		<br><br>
		<button class="btn btn-primary" style="background-color:#34a29b;" name="requst_for_returned_date">Request For Book</button>

	</form>
</div>

		<h4>Information of Books!</h4>
		<?php
		if(isset($_POST['submit'])){

			$searchBook = mysqli_query($link, "SELECT * FROM books WHERE name like '%$_POST[search]%'");
			
				if( mysqli_num_rows($searchBook) == 0){

					echo "No Book Found! Please Try Again!";
				}
				else
				{
					echo "<table class='table table-bordered table-hover'>";
					echo "<tr style = 'background-color:#34a29b;'>";
					echo "<th>"; echo "ID"; echo "</th>";
					echo "<th>"; echo "Book Name"; echo "</th>";
					echo "<th>"; echo "Author Name"; echo "</th>";
					echo "<th>"; echo "Edition"; echo "</th>";
					echo "<th>"; echo "Status"; echo "</th>";
					echo "<th>"; echo "Quantity"; echo "</th>";
					echo "<th>"; echo "Department"; echo "</th>";
				echo "</tr>";
				while ($row = mysqli_fetch_assoc($searchBook)) {
					echo "<tr>";
						echo "<td>"; echo $row['bid']; echo "</td>";
						echo "<td>"; echo $row['name']; echo "</td>";
						echo "<td>"; echo $row['author']; echo "</td>";
						echo "<td>"; echo $row['edition']; echo "</td>";
						echo "<td>"; echo $row['status']; echo "</td>";
						echo "<td>"; echo $row['quantity']; echo "</td>";
						echo "<td>"; echo $row['department']; echo "</td>";
					echo "</tr>";
				}
			echo "</table>";
					}
		}  /*If button not working......*/
		else{
		$sql = mysqli_query($link,"SELECT * FROM `books` order by `books`.`name`");

		echo "<table class='table table-bordered table-hover'>";

			echo "<tr style = 'background-color:#34a29b;'>";
					echo "<th>"; echo "ID"; echo "</th>";
					echo "<th>"; echo "Book Name"; echo "</th>";
					echo "<th>"; echo "Author Name"; echo "</th>";
					echo "<th>"; echo "Edition"; echo "</th>";
					echo "<th>"; echo "Status"; echo "</th>";
					echo "<th>"; echo "Quantity"; echo "</th>";
					echo "<th>"; echo "Department"; echo "</th>";
				echo "</tr>";
				while ($row = mysqli_fetch_assoc($sql)) {
					echo "<tr>";
						echo "<td>"; echo $row['bid']; echo "</td>";
						echo "<td>"; echo $row['name']; echo "</td>";
						echo "<td>"; echo $row['author']; echo "</td>";
						echo "<td>"; echo $row['edition']; echo "</td>";
						echo "<td>"; echo $row['status']; echo "</td>";
						echo "<td>"; echo $row['quantity']; echo "</td>";
						echo "<td>"; echo $row['department']; echo "</td>";
					echo "</tr>";
				}
			echo "</table>";
		}


		?>
		
		</div>
	</body>
</html>

