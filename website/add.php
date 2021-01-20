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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- google fonts  -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
</head>
<?php
	$name=$_POST['name'];
    $type=$_POST['type'];
    $pin=$_POST['pin'];
    $query="insert into new (pin,name,type) values (".$pin.",'".$name."','".$type."')";
    mysqli_query($connect,$query);
?>
<body>
	<div class="agile-login">
		<h1> <a href="check.php"><img src="images/back.png" width="50px"></a> Home Automation</h1>
        <div class="container">
  <h2>Add New </h2>
  <form action="" method="post">
    <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Name for the new Device" name="name">
    </div>
    <div class="form-group">
      <label for="pwd">Type:</label>
      <select name="type" class="form-control" id="email" > 
            <option value="switch">Switch</option>
            <option value="regulator">Regulator</option>
      </select>
      <select name="pin" class="form-control" id="email" > 
            <option value="" disabled selected>Select Pin</option>
            <?php
            $query = "SELECT pin FROM new";  
            $i=0;  
            for($i=0;$i<=28;$i++){
            $flag=0;
            $result = mysqli_query($connect, $query);
			while($row = mysqli_fetch_array($result))
			{
                if($i==$row['pin'])
                    $flag=1;
            }
            if($flag==0)
                    echo'<option value="'.$i.'">'.$i.'</option>';
            }
            ?>
      </select>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
	</div>
</body>
</html>
