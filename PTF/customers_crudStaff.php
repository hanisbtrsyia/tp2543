<?php
error_reporting(0);
require_once("db.php");
session_start();
if(isset($_SESSION['admin_login']))
{
    header("location: admin.php");
}
if(isset($_SESSION["sv_login"]))
{
    header("location: svhome.php");
}
if(!isset($_SESSION["staff_login"]))
{
    header("location: ../PTF/index.php");
}
if(isset($_SESSION["staff_login"]))
{
?>
<?php
//Create
if (isset($_POST['create'])) {
 
  echo ("<script type =\"text/javascript\">");
  echo ("alert('Sorry you are not allowed to do this action!');");
  echo ("</script>");
}
 
//Update
if (isset($_POST['update'])) {
   
  echo ("<script type =\"text/javascript\">");
  echo ("alert('Sorry you are not allowed to do this action!);");
  echo ("</script>");
}
 
//Delete
if (isset($_GET['delete'])) {
 
  echo ("<script type =\"text/javascript\">");
  echo ("alert('Sorry you are not allowed to do this action!');");
  echo ("</script>");
}
 
//Edit
if (isset($_GET['edit'])) {
   
  echo ("<script type =\"text/javascript\">");
  echo ("alert('Sorry you are not allowed to do this action!');");
  echo ("</script>");
}
 
  //$conn = null;
 
?>
<?php
}
?>