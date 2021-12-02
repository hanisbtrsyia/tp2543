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
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Syalectric: Home</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/main.css" rel="stylesheet"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
    .container {
        position: absolute;
        font-family: Sans-serif;
        font-style: bold;
      }

      .text-block {
        position: absolute;
        top: 80px;
        right: 200px;
        left: 400px;
        background-color:black;
        color: white;
        opacity:100%;
        margin: auto;
        width: 28%;
        height:430px;
        padding: 10px;
        box-shadow: 1px 1px 1px 2px #fbfbfb;
      }

       .text1 {
        position: absolute;
        top: 60px;
        right: 0px;
        left: 0px;
        color: white;
        opacity:100%;
        
        font-size: 30px;
        margin: auto;
        width: 100%;
        height:400px;
      }
        .text2 {
            position: absolute;
            top: 190px;
            right: 0px;
            left: 0px;
            color: white;
            opacity:100%;
            font-family: sans-serif;
            font-style: bold;
            font-size: 18px;
            margin: auto;
            width: 100%;
            height:400px;
          }

      body {
          background-color: #000000;
        }

      img {
          opacity:80%;
          height:410px;
        }

    .btn {
        width: 300px;
        border-radius: 23px;
        background-color: #fbfbfb;
        color:black;
    }
</style>
   
</head>
<body>
<!--<div class="container center-wrapper text-center">-->
<div class="container">
  <div class="text-block">
    <img src="img_10.jpg" style="width:100%" alt="img" >
    <?php
    unset($_SESSION);
    session_destroy();
    header( "refresh:5;url=login.php" );

    ?>
     <center>
    <div class="text1">
    <h1>You have been logged out.</h1><br></div>
    <div class="text2">
    <p>Thank you for trusting us.</p>
    <p>We'll miss you.</p>
    <br><br><br><br>
    <a class="btn btn-default btn-lg btn-block" href="login.php" role="button">Goodbye</a>
</center>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>