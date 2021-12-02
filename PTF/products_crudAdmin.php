<?php 
error_reporting(0);
require_once("db.php");
session_start();
if(!isset($_SESSION['admin_login']))
{
    header("location: ../projectkuu/index.php");
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
 
      $stmt = $conn->prepare("INSERT INTO tbl_products_a175275(fld_product_id,
        fld_product_name, fld_product_price, fld_product_brand, fld_product_size,
        fld_product_category, fld_product_quantity, fld_product_image) VALUES(:prod_id, :prod_name, :prod_price, :prod_brand,
        :prod_size, :prod_category, :prod_quantity, :prod_image)");
     
      $stmt->bindParam(':prod_id', $prod_id, PDO::PARAM_STR);
      $stmt->bindParam(':prod_name', $prod_name, PDO::PARAM_STR);
      $stmt->bindParam(':prod_price', $prod_price, PDO::PARAM_INT);
      $stmt->bindParam(':prod_brand', $prod_brand, PDO::PARAM_STR);
      $stmt->bindParam(':prod_size', $prod_size, PDO::PARAM_STR);
      $stmt->bindParam(':prod_category', $prod_category, PDO::PARAM_STR);
	  $stmt->bindParam(':prod_quantity', $prod_quantity, PDO::PARAM_INT);
      $stmt->bindParam(':prod_image', $prod_image, PDO::PARAM_STR);
       
    $prod_id = $_POST['prod_id'];
    $prod_name = $_POST['prod_name'];
    $prod_price = $_POST['prod_price'];
    $prod_brand =  $_POST['prod_brand'];
    $prod_size = $_POST['prod_size'];
    $prod_category = $_POST['prod_category'];
	$prod_quantity = $_POST['prod_quantity'];
    $prod_image = $_POST['prod_image'];
     
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
 
      $stmt = $conn->prepare("UPDATE tbl_products_a175275 SET fld_product_id = :prod_id,
        fld_product_name = :prod_name, fld_product_price = :prod_price, fld_product_brand = :prod_brand,
        fld_product_size = :prod_size, fld_product_category = :prod_category, fld_product_quantity = :prod_quantity, 
        fld_product_image = :prod_image
        WHERE fld_product_id = :oldpid");
     
      $stmt->bindParam(':prod_id', $prod_id, PDO::PARAM_STR);
      $stmt->bindParam(':prod_name', $prod_name, PDO::PARAM_STR);
      $stmt->bindParam(':prod_price', $prod_price, PDO::PARAM_INT);
      $stmt->bindParam(':prod_brand', $prod_brand, PDO::PARAM_STR);
      $stmt->bindParam(':prod_size', $prod_size, PDO::PARAM_STR);
      $stmt->bindParam(':prod_category', $prod_category, PDO::PARAM_STR);
	  $stmt->bindParam(':prod_quantity', $prod_quantity, PDO::PARAM_INT);
      $stmt->bindParam(':prod_image', $prod_image, PDO::PARAM_STR);
      $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);
       
    $prod_id = $_POST['prod_id'];
    $prod_name = $_POST['prod_name'];
    $prod_price = $_POST['prod_price'];
    $prod_brand =  $_POST['prod_brand'];
    $prod_size = $_POST['prod_size'];
    $prod_category = $_POST['prod_category'];
    $prod_quantity = $_POST['prod_quantity'];
    $prod_image = $_POST['prod_image'];
    $oldpid = $_POST['oldpid'];
     
    $stmt->execute();
 
    header("Location: productsAdmin.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
      $stmt = $conn->prepare("DELETE FROM tbl_products_a175275 WHERE fld_product_id = :prod_id");
     
      $stmt->bindParam(':prod_id', $prod_id, PDO::PARAM_STR);
       
    $prod_id = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: productsAdmin.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
 
  try {
 
      $stmt = $conn->prepare("SELECT * FROM tbl_products_a175275 WHERE fld_product_id = :prod_id");
     
      $stmt->bindParam(':prod_id', $prod_id, PDO::PARAM_STR);
       
    $prod_id = $_GET['edit'];
     
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