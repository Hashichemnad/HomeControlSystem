<?php
require 'db.php'; 
session_start();
if ( $_SESSION['logged_i'] !=1  )  {
header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta tags -->
	<title>Home automation</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- stylesheets -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- google fonts  -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
</head>
<body>
	<div class="agile-login">
		<h1>Home Automation</h1>
		<center><a href="add.php"><button class="btn btn-default">Add New</button></a></center>
		<div class="wrapper">
		<center><a href="main.php"><button class="btn btn-success">Switch</button></a><a href="s2t.php"> &nbsp;<button class="btn btn-primary">Voice</button></a></center>
			<h2 style="margin-top:20px;">usage</h2>

			<?php
			$date = date_default_timezone_set('Asia/Kolkata');
			echo "TODAY : ".date("d/m/Y h:i:s a", time());
			$query = "SELECT * FROM new";  
			$result = mysqli_query($connect, $query);  
			while($row = mysqli_fetch_array($result))
			{
			echo "<br><br>".$row['name'];
			if($row['status']=='on')
			{
			$time=date("d/m/Y h:i:s a", $row['onn']);
			$tt=gmdate("H:i:s", $row['total']);
			echo "<br>ON at ".$time;
			echo "<br>total usage : ".$tt;
			}
			else
			{
			$time=date("d/m/Y h:i:s a", $row['off']);
			$tt=gmdate("H:i:s", $row['total']);
			echo "<br>OFF at ".$time;
			echo "<br>total usage : ".$tt;
			}
			}
			?>
		</div>
	</div>
</body>
</html>
