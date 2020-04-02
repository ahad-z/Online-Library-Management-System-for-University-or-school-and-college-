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
<?php
$c = 0;

$sql = mysqli_query($link, "SELECT issue_book.`username`,issue_book.`rolls`, books.`bid`, books.`name` , books.`author`, books.`edition`,books.`status`, books.`quantity`, books.`department`, issue_book.issueDate, issue_book.returnDate FROM books INNER JOIN issue_book ON books.bid = issue_book.bid WHERE issue_book.approve = 'Yeas'");

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

    $d = date("Y-m-d");

    if ($d > $row['returnDate'])
    {

        $c = $c + 1;

        $var = 'Expired';

        $exper = mysqli_query($link, "UPDATE `issue_book` SET `approve`= '$var' WHERE `returnDate` = '$row[returnDate]' AND `approve` = 'Yeas' limit $c");

    }

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
    echo $row['issueDate'];
    echo "</td>";
    echo "<td>";
    echo $row['returnDate'];
    echo "</td>";
    echo "</tr>";
}

echo "</table>";

?>

</div>
</body>
</html>