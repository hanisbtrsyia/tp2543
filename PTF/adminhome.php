<?php
error_reporting(0);
require_once("db.php");
session_start();
if(!isset($_SESSION["admin_login"]))
{
    header("location: ../PTF/index.php");
}
if(isset($_SESSION["sv_login"]))
{
    header("location: svhome.php");
}
if(isset($_SESSION["staff_login"]))
{
    header("location: staffs.php");
}
if(isset($_SESSION["admin_login"]))
{
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Bagstopia</title>
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
        background:url(logo.png) center center no-repeat;
        min-height:100%;
      }
    </style>
</head>
<body>
	<?php include_once 'nav_barAdmin.php'; ?>

          <!--<div align="center" class="style26">Selamat Datang <?php //echo $_SESSION['fld_staff_id']; ?></strong> </div> -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
}
?>