
<?php
session_start();
require '../db/dbcon.php';

if(!isset($_SESSION['userName'])){

	header('location:admin_login.php');

	}
if(isset($_POST['add_book'])){

	$names_book  = $_POST['names_book'];
	$name_author = $_POST['name_author'];
	$edition     = $_POST['edition'];
	$book_status = $_POST['book_status'];
	$quantity    = $_POST['quantity'];
	$faculty     = $_POST['faculty'];


	$sql = mysqli_query($link, "INSERT INTO `books`(`name`, `author`, `edition`, `status`, `quantity`, `department`) VALUES ('$names_book', '$name_author', '$edition', '$book_status', '$quantity', '$faculty')");

	if($sql){

		$_SESSION['book_msg'] = "Book add successfully!";
	}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Books</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<style type="text/css">
	body {
		font-family: "Lato", sans-serif;
		transition: background-color .5s;
		}
		.sidenav {
		margin-top: 52px;
		height: 950px;
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

				<?php
				if(isset($_SESSION['book_msg'])){

					echo "<div class='alert alert-info' style='margin-left: 420px; width:50%; text-align: center;'>" .$_SESSION['book_msg'] ."</div>";

					unset($_SESSION['book_msg']);
				}
					?>
		
	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="" method="POST">
				<span class="contact100-form-title">
					Add New Book Here!
				</span>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Book Name</span>
					<input class="input100" type="text" name="names_book" placeholder="Enter Book Name" required="">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Author Name</span>
					<input class="input100" type="text" name="name_author" placeholder="Enter Author Name" required="">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Edition</span>
					<input class="input100" type="text" name="edition" placeholder="Enter Edition" required="">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Status</span>
					<input class="input100" type="text" name="book_status" placeholder="Enter Status" required="">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Quantity</span>
					<input class="input100" type="text" name="quantity" placeholder="Enter Quantity" required="">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 input100-select">
					<span class="label-input100">Faculty</span>
					<div>
						<select class="selection-2" name="faculty" required="">
							<option>Choose Faculty</option>
							<option value="cse">CSE</option>
							<option value="eee">EEE</option>
							<option value="civil">CIVIL</option>
							<option value="ece">ECE</option>
							<option value="bba">BBA</option>
							<option value="english">English</option>
							<option value="social sceience">Socail Sceience</option>
						</select>
					</div>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn" name="add_book">
							<span>
								Submit
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>


</div>
	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
