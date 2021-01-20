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
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- stylesheets -->
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- google fonts  -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
</head>
<?php
if (isset($_POST['off']))
{
$id=$_POST['off'];
$dt = time();
$query = "SELECT * FROM new WHERE id=".$id."";  
$result = mysqli_query($connect, $query);  
$row = mysqli_fetch_array($result);
$dta=$row['onn'];
$new=$row['total']+($dt-$dta);
$query="UPDATE new SET off = '".$dt."', total = '".$new."', status='off' WHERE id =".$id."";
mysqli_query($connect,$query);
}
if (isset($_POST['on']))
{
$id=$_POST['on'];
$dt = time();
$query="UPDATE new SET onn = '".$dt."', status='on' WHERE id =".$id."";
mysqli_query($connect,$query);
}

?>
<body>
	<div class="agile-login">
		<h1> <a href="check.php"><img src="images/back.png" width="50px"></a> Home Automation</h1>
		<div class="wrapper">
			<h2>Switch</h2>
			<div class="w3ls-form">
				<form action="" method="post">
				<?php
			$query = "SELECT * FROM new";  
			$result = mysqli_query($connect, $query);  
			while($row = mysqli_fetch_array($result))
			{
				echo'<label>'.$row['name'].'</label>';
		         if($row['status']=='off')
			       echo'<button type="submit" name="on" value="'.$row['id'].'">ON</button>';
			     else
			       echo'<button type="submit" name="off" value="'.$row['id'].'">OFF</button>';
			}
			       ?>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
