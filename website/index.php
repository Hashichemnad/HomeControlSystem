<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
if ( $_SESSION['logged_i'] ==1  )  {
header("location:check.php");
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
   if(isset($_POST["login"]))
   {
   $name = 'CSE';
   $pass = 'password';
   if ($_POST['pass']==$pass && $_POST['name']==$name ) {
   header("location:check.php");
   $_SESSION['logged_i']=1;
   // This is how we'll know the user is logged in
   }
   else {
   $_SESSION['message'] = "You have entered wrong password, try again!";
   echo '<script>alert("wrong password")</script>';
   }
   }
  }
  ?>
<body>
	<div class="agile-login">
		<h1>Home Automation Login Form</h1>
		<div class="wrapper">
			<h2>Login</h2>
			<div class="w3ls-form">
				<form action="#" method="post">
					<label>Username</label>
					<input type="text" name="name" placeholder="Username" required/>
					<label>Password</label>
					<input type="text" name="pass" placeholder="Password" required />
					<input type="submit" name="login" value="LogIn" />
				</form>
			</div>
		</div>
		<br>
	</div>
</body>
</html>
