<?php
require '../db/dbcon.php';
require 'nav.php';
require 'action_student.php';

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Feedback</title>
		<link href="../css/font-awesome.min.css" rel="stylesheet">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
	</head>
	<style>
		#round_input{
	border-radius: 25px;
	border: 2px solid gray;
	padding: 10px;
	width: 100%;
	height: 5%;
	}
	#round_comment{
	border-radius: 30px;
	border: 2px solid gray;
	padding: 20px;
	width: 100%;
	}
	</style>
	<body>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<h5 style="font-style: italic;font-size: 20px; color: green; margin-left: 20px;margin-bottom:5px;">
					<?php 
					if(isset($_SESSION['feed_msg'])){
						echo $_SESSION['feed_msg'];
					}

					?>
					</h5>

				<div class="card-header" style="margin-bottom: 10px; font-style: italic; color: gray;">Give Your Feedbacke Here!!</div>
				<div class="card-body">
					<form action="" method="POST" class="form-group">
						<div class="form-group">
							
							<input type="hidden" name="name" value="<?=$_SESSION['activeUser']['firstname'];?>">
							<input type="hidden" name="stu_type" value="student">

						</div>
						<div class="form-group">
							<textarea name="comment" id="round_comment" class="form-control" placeholder="Enter your Comment Here!" required=""></textarea>
						</div>
						<button class="btn btn-primary" name="submit_feedback"><i class="fa fa-paper-plane fa-2x"> Submit</i></button>
					</form>
				</div>
				
			</div>
		</div>
<br><div class="row">
				<?php
				$cath_feed = mysqli_query($link ,"SELECT * FROM feedbacks ORDER BY id DESC");
				?>
				<?php
					while ($feed_row = mysqli_fetch_assoc($cath_feed)){?>
					<div class="col-sm-4 col-sm-offset-4">
						<div class="card-title">
							<?php if ($feed_row['type'] == 'student'): ?>
							<h5 style="margin-bottom: 10px; color: gray; font-size: 25px;"><span class="badge badge-success"><?=$feed_row['name'];?></span>
							<?php else: ?>
							<h5 style="margin-bottom: 10px; color: gray; font-size: 25px;"><span class=" badge badge-danger"><?=$feed_row['type'];?></span></h5>
								<?php endif ?>
							</h5>
						</div>
						<div class="card-body">
							<p class="lead" id="round_comment"><?=$feed_row['feedback']?></p>
						</div>
						
					</div>
				<?php
				}
				?>
		</div>
	</body>
</html>