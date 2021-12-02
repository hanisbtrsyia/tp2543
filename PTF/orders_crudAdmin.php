<?php
error_reporting(0);
require_once("db.php");
session_start();
if(!isset($_SESSION['admin_login']))
{
    header("location: ../PTF/index.php");
}
if(isset($_SESSION["sv_login"]))
{
    header("location: svhome.php");
}
if(isset($_SESSION["staff_login"]))
{
    header("location: staff.php");
}
if(isset($_SESSION["admin_login"]))
{
?>
<?php
//Create
if (isset($_POST['create'])) {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_orders_a175275(fld_order_id, fld_staff_id,
      fld_cust_id) VALUES(:order_id, :staff_id, :cust_id)");
   
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_STR);
    $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
    $stmt->bindParam(':cust_id', $cust_id, PDO::PARAM_STR);
       
    $order_id = uniqid('O', true);
    $staff_id = $_POST['staff_id'];
    $cust_id = $_POST['cust_id'];
     
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
 
    $stmt = $conn->prepare("UPDATE tbl_orders_a175275 SET fld_staff_id = :staff_id,
      fld_cust_id = :cust_id WHERE fld_order_id = :order_id");
   
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_STR);
    $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_STR);
    $stmt->bindParam(':cust_id', $cust_id, PDO::PARAM_STR);
       
    $order_id = $_POST['order_id'];
    $staff_id = $_POST['staff_id'];
    $cust_id = $_POST['cust_id'];
     
    $stmt->execute();
 
    header("Location: ordersAdmin.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
    $stmt = $conn->prepare("DELETE FROM tbl_orders_a175275 WHERE fld_order_id = :order_id");
   
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_STR);
       
    $order_id = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: ordersAdmin.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
   
    try {
 
    $stmt = $conn->prepare("SELECT * FROM tbl_orders_a175275 WHERE fld_order_id = :order_id");
   
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_STR);
       
    $order_id = $_GET['edit'];
     
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