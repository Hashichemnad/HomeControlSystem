<?php
require 'db.php';
session_start();
if ( $_SESSION['logged_i'] !=1  ) 
    header("location:index.php");
    $flag=0;
    $command=$_GET['command'];
    $query = "SELECT * FROM new";  
	$result = mysqli_query($connect, $query);  
	while($row = mysqli_fetch_array($result))
	{
        if($command==$row['name']." on"){
            $id=$row['id'];
            $dt = time();
            $query1="UPDATE new SET onn = '".$dt."', status='on' WHERE id =".$id."";
            mysqli_query($connect,$query1);
            $flag=1;
            break;
        }
    else if($command==$row['name']." off"){
        $id=$row['id'];
        $dt = time();
        $query = "SELECT * FROM new WHERE id=".$id."";  
        $result = mysqli_query($connect, $query);  
        $row = mysqli_fetch_array($result);
        $dta=$row['onn'];
        $new=$row['total']+($dt-$dta);
        $query="UPDATE new SET off = '".$dt."', total = '".$new."', status='off' WHERE id =".$id."";
        mysqli_query($connect,$query);
        $flag=1;
        break;
       }
    }
    if($flag==1)
        echo"Success";
    else
        echo"No Command Found";
    
?>