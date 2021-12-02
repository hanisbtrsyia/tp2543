<?php
error_reporting(0);
require_once("db.php");
session_start();
if(isset($_SESSION['admin_login']))
{
    header("location: admin.php");
}
if(!isset($_SESSION["sv_login"]))
{
    header("location: ../PTF/index.php");
}
if(isset($_SESSION["staff_login"]))
{
    header("location: staff.php");
}
if(isset($_SESSION["sv_login"]))
{
?>
<?php
//Create
if (isset($_POST['create'])) {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_customers_a175275(fld_cust_id, fld_cust_name, fld_cust_gender, fld_cust_email,  fld_cust_phone) VALUES(:cust_id, :cust_name, :cust_gender, :cust_email, :cust_phone)");
   
    $stmt->bindParam(':cust_id', $cust_id, PDO::PARAM_STR);
    $stmt->bindParam(':cust_name', $cust_name, PDO::PARAM_STR);
	$stmt->bindParam(':cust_gender', $cust_gender, PDO::PARAM_STR);
    $stmt->bindParam(':cust_email', $cust_email, PDO::PARAM_STR);
    $stmt->bindParam(':cust_phone', $cust_phone, PDO::PARAM_STR);
       
    $cust_id = $_POST['cust_id'];
    $cust_name = $_POST['cust_name'];
	$cust_gender =  $_POST['cust_gender'];
    $cust_email = $_POST['cust_email'];
    $cust_phone =  $_POST['cust_phone'];
       
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
 
    $stmt = $conn->prepare("UPDATE tbl_customers_a175275 SET fld_cust_id = :cust_id, fld_cust_name = :cust_name, fld_cust_gender = :cust_gender, fld_cust_email = :cust_email, fld_cust_phone = :cust_phone
      WHERE fld_cust_id = :oldcid");
   
    $stmt->bindParam(':cust_id', $cust_id, PDO::PARAM_STR);
    $stmt->bindParam(':cust_name', $cust_name, PDO::PARAM_STR);
	$stmt->bindParam(':cust_gender', $cust_gender, PDO::PARAM_STR);
    $stmt->bindParam(':cust_email', $cust_email, PDO::PARAM_STR);
    $stmt->bindParam(':cust_phone', $cust_phone, PDO::PARAM_STR);
    $stmt->bindParam(':oldcid', $oldcid, PDO::PARAM_STR);
       
    $cust_id = $_POST['cust_id'];
    $cust_name = $_POST['cust_name'];
	$cust_gender = $_POST['cust_gender'];
    $cust_email = $_POST['cust_email'];
    $cust_phone =  $_POST['cust_phone'];
    $oldcid = $_POST['oldcid'];
       
    $stmt->execute();
 
    header("Location: customersSv.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
    $stmt = $conn->prepare("DELETE FROM tbl_customers_a175275 WHERE fld_cust_id = :cust_id");
   
    $stmt->bindParam(':cust_id', $cust_id, PDO::PARAM_STR);
       
    $cust_id = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: customersSv.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
   
  try {
 
    $stmt = $conn->prepare("SELECT * FROM tbl_customers_a175275 WHERE fld_cust_id = :cust_id");
   
    $stmt->bindParam(':cust_id', $cust_id, PDO::PARAM_STR);
       
    $cust_id = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
  //$conn = null;
 
?>
<?php
}
?>