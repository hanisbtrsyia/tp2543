<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
      $stmt = $conn->prepare("INSERT INTO tbl_products_a175218_pt2(FLD_PRODUCT_ID,
        FLD_PRODUCT_NAME, FLD_MODEL, FLD_PRICE, FLD_CATEGORY_ID, 
        FLD_WARRANTY, FLD_STOCK_AVAILABLE) VALUES(:pid, :name, :model, :price, :category,
        :warranty, :stock)");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':model', $model, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':category', $category, PDO::PARAM_STR);
      $stmt->bindParam(':warranty', $warranty, PDO::PARAM_INT);
      $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
       
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $model = $_POST['model'];
    $price =  $_POST['price'];
    $category = $_POST['category'];
    $warranty = $_POST['warranty'];
    $stock = $_POST['stock'];
     
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
 
      $stmt = $conn->prepare("UPDATE tbl_products_a175218_pt2 SET FLD_PRODUCT_ID = :pid,
        FLD_PRODUCT_NAME = :name, FLD_MODEL = :model, FLD_PRICE = :price,
        FLD_CATEGORY_ID = :category, FLD_WARRANTY = :warranty, FLD_STOCK_AVAILABLE = :stock
        WHERE FLD_PRODUCT_ID = :oldpid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':model', $model, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':category', $category, PDO::PARAM_STR);
      $stmt->bindParam(':warranty', $warranty, PDO::PARAM_INT);
      $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
      $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);
       
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $model = $_POST['model'];
    $price =  $_POST['price'];
    $category = $_POST['category'];
    $warranty = $_POST['warranty'];
    $stock = $_POST['stock'];
    $oldpid = $_POST['oldpid'];
     
    $stmt->execute();
 
    header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
      $stmt = $conn->prepare("DELETE FROM tbl_products_a175218_pt2 WHERE FLD_PRODUCT_ID = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
 
  try {
 
      $stmt = $conn->prepare("SELECT * FROM tbl_products_a175218_pt2 WHERE FLD_PRODUCT_ID = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
  $conn = null;
?>