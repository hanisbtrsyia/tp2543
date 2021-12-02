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
if (isset($_POST['addproduct'])) {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_orders_details_a175275(fld_order_detail_id,
      fld_order_id, fld_product_id, fld_order_detail_qty) VALUES(:detail_id, :order_id,
      :prod_id, :prod_quantity)");
   
    $stmt->bindParam(':detail_id', $detail_id, PDO::PARAM_STR);
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_STR);
    $stmt->bindParam(':prod_id', $prod_id, PDO::PARAM_STR);
    $stmt->bindParam(':prod_quantity', $prod_quantity, PDO::PARAM_INT);
       
    $detail_id = uniqid('D', true);
    $order_id = $_POST['order_id'];
    $prod_id = $_POST['prod_id'];
    $prod_quantity= $_POST['prod_quantity'];
     
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
  $_GET['order_id'] = $order_id;
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
    $stmt = $conn->prepare("DELETE FROM tbl_orders_details_a175275 where fld_order_detail_id = :detail_id");
   
    $stmt->bindParam(':detail_id', $detail_id, PDO::PARAM_STR);
       
    $detail_id = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: orders_detailsStaff.php?order_id=".$_GET['order_id']);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
?>
<?php
}
?>