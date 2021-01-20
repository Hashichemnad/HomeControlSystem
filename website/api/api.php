<?php
require 'db.php'; 

if (mysqli_connect_errno()) 
  die('Could not connect: ' . mysql_error());

$return_arr = array();
$sql="select * from new";
if ($result = mysqli_query( $connect, $sql )){
    while ($row = mysqli_fetch_assoc($result)) {
    $row_array['pin'] = $row['pin'];
    $row_array['status'] = $row['status'];

    array_push($return_arr,$row_array);
   }
 }

mysqli_close($base);
echo json_encode($return_arr);
?>
