<?php 
error_reporting(0);
require_once("db.php");

session_start();
if(isset($_SESSION['noId']))
{
?>
<?php
//Create
if (isset($_POST['create'])) {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_staffs_a175275(fld_staff_id, fld_staff_name, fld_staff_pass, fld_staff_gender, fld_staff_phone, fld_staff_email) VALUES(:staff_id, :staff_name, :staff_pass, :staff_gender, :staff_phone, :staff_email)");
   
    $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
    $stmt->bindParam(':staff_name', $staff_name, PDO::PARAM_STR);
	$stmt->bindParam(':staff_pass', $staff_pass, PDO::PARAM_STR);
	$stmt->bindParam(':staff_gender', $staff_gender, PDO::PARAM_STR);
	$stmt->bindParam(':staff_phone', $staff_phone, PDO::PARAM_STR);
    $stmt->bindParam(':staff_email', $staff_email, PDO::PARAM_STR);
    
    
       
    $staff_id = $_POST['staff_id'];
    $staff_name = $_POST['staff_name'];
	$staff_pass =  $_POST['staff_pass'];
	$staff_gender = $_POST['staff_gender'];
    $staff_phone = $_POST['staff_phone'];
	$staff_email = $_POST['staff_email'];
    
      
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Update
if (isset($_POST['update'])) {
   
  try {
 
    $stmt = $conn->prepare("UPDATE tbl_staffs_a175275 SET
	
	fld_staff_id = :staff_id, fld_staff_name = :staff_name, fld_staff_pass = :staff_pass, fld_staff_gender = :staff_gender, fld_staff_phone = :staff_phone, fld_staff_email = :staff_email WHERE fld_staff_id = :oldsid");
   
    $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
    $stmt->bindParam(':staff_name', $staff_name, PDO::PARAM_STR);
	$stmt->bindParam(':staff_pass', $staff_pass, PDO::PARAM_STR);
	$stmt->bindParam(':staff_gender', $staff_gender, PDO::PARAM_STR);
	$stmt->bindParam(':staff_phone', $staff_phone, PDO::PARAM_STR);
    $stmt->bindParam(':staff_email', $staff_email, PDO::PARAM_STR);
    $stmt->bindParam(':oldsid', $oldsid, PDO::PARAM_STR);
       
    $staff_id = $_POST['staff_id'];
    $staff_name = $_POST['staff_name'];
	$staff_pass =  $_POST['staff_pass'];
	$staff_gender = $_POST['staff_gender'];
    $staff_phone = $_POST['staff_phone'];
	$staff_email = $_POST['staff_email'];
    $oldsid = $_POST['oldsid'];
         
    $stmt->execute();
 
    header("Location: staffs.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
    $stmt = $conn->prepare("DELETE FROM tbl_staffs_a175275 where fld_staff_id = :staff_id");
   
    $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
       
    $staff_id = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: staffs.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
   
  try {
 
    $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a175275 where fld_staff_id = :staff_id");
   
    $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
       
    $staff_id = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
 // $conn = null;
 
?>
<?php
}
else
{
  header("Location: index.php");
}
?>