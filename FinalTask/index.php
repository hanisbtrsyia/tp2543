<?php
require 'database.php';

if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
  <title>SYALECTRIC</title>
<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     <style type="text/css">
      html {
        width:100%;
        height:100%;
        background:url(img_8.jpg) center center no-repeat;
        min-height:100%;
        background-size: cover;
      }

      .container {
        position: absolute;
        font-family: Serif;
        font-style: italic;
      }

      .text-block {
        position: absolute;
        top: 160px;
        right: 900px;
        left: 2px;
        color: black;
        opacity:78%;
        padding-left: 25px;
        padding-right: 25px;
        padding-top: 0px;
        padding-bottom: 15px;
        font-family: sans-Serif;
        font-style: bold;
        font-size: 20px;
      }

      .text {
        position: absolute;
        top: 70px;
        right: 900px;
        left: 2px;
        font-family: sans-serif;
        font-style: italic;
        font-size: 70px;
        
        color: black;
        opacity:79%;
        padding-left: 20px;
      }

      .btn {
        background-color: #7f0000; 
        color: #ffffff; 
      }
         
    </style>
</head>
<body>
  
  <?php include_once 'nav_bar.php'; ?>

  <div class="text">
      <p>SYALECTRIC</p> 
  </div>

 <div class="text-block">
      <p>Improving the quality of people's lives through technology-enabled meaningful innovations.</p>
      <button class="btn" >Get Started</button>
    </div>
  <!--<div class="container">
  <div class="text-block">
      <h3>Improving the quality of people's lives through technology-enabled meaningful innovations.</h3>
    </div>
  </div>-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
     
</body>
</html>