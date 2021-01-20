<?php
require 'db.php'; 
session_start();
if ( $_SESSION['logged_i'] !=1  )  {
header("location:index.php");
$values='["blue light on", "green light on", "red light on", "fan on", "all on", "all off", "blue light off", "green light off", "red light off", "fan off"]';
}
?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>IoT Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/shoelace-css/1.0.0-beta16/shoelace.css">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="container">
        <h1> <a href="check.php"><img src="images/back.png" width="50px"></a> Home Automation</h1>
            <div class="app"> 
                <div class="input-single">
                    <textarea id="note-textarea" placeholder="" rows="6"></textarea>
                </div>         
                <button id="start-record-btn" title="Start Recording">Talk</button>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="script.js"></script>
    </body>
</html>


