<?php
 
include_once 'database.php';

if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
  if (isset($_SESSION['user']) && $_SESSION['user']['FLD_USER_LEVEL'] == 'admin') {
    
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_customers_a175218_pt2(FLD_CUSTOMER_ID, FLD_CUSTOMER_NAME,
      FLD_PHONE, FLD_EMAIL, FLD_ADDRESS) VALUES(:cid, :name, :phone,
      :email, :address)");
   
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
       
    $cid = $_POST['cid'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email =  $_POST['email'];
    $address = $_POST['address'];
       
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      $_SESSION['error'] = "Error while creating: " . $e->getMessage();
        }
     }else {
        $_SESSION['error'] = "Sorry, you are not eligible for creating a new customer.";
    }

    header("LOCATION: {$_SERVER['REQUEST_URI']}");
    exit();
}
//Update
if (isset($_POST['update'])) {
   if (isset($_SESSION['user']) && $_SESSION['user']['FLD_USER_LEVEL'] == 'admin') {
  try {
 
    $stmt = $conn->prepare("UPDATE tbl_customers_a175218_pt2 SET FLD_CUSTOMER_ID = :cid,
      FLD_CUSTOMER_NAME = :name, FLD_PHONE = :phone,
      FLD_EMAIL = :email, FLD_ADDRESS = :address
      WHERE FLD_CUSTOMER_ID = :oldcid");
   
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
    $stmt->bindParam(':oldcid', $oldcid, PDO::PARAM_STR);
       
    $cid = $_POST['cid'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email =  $_POST['email'];
    $address = $_POST['address'];
    $oldcid = $_POST['oldcid'];
       
    $stmt->execute();
 
    header("Location: customers.php");
    }
 
  catch(PDOException $e)
  {
    $_SESSION['error'] = "Error while updating: " . $e->getMessage();
            header("LOCATION: customers.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Sorry, you're not an admin. Only admin can update this form.";
    }

    header("LOCATION: {$_SERVER['PHP_SELF']}");
    exit();
}

 
//Delete
if (isset($_GET['delete'])) {
 if (isset($_SESSION['user']) && $_SESSION['user']['FLD_USER_LEVEL'] == 'admin') {
  try {
 
    $stmt = $conn->prepare("DELETE FROM tbl_customers_a175218_pt2 WHERE FLD_CUSTOMER_ID = :cid");
   
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
       
    $cid = $_GET['delete'];
     
    $stmt->execute();}
 
    catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        $_SESSION['error'] = "Sorry, you're not an admin. Only admin can delete this form.";
    }

    header("LOCATION: {$_SERVER['PHP_SELF']}");
    exit();
}
 
//Edit
if (isset($_GET['edit'])) {
   if (isset($_SESSION['user']) && $_SESSION['user']['FLD_USER_LEVEL'] == 'admin') {
  try {
 
    $stmt = $conn->prepare("SELECT * FROM tbl_customers_a175218_pt2 WHERE FLD_CUSTOMER_ID = :cid");
   
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
       
    $cid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch (PDOException $e) {
            $_SESSION['error'] = "Error: " . $e->getMessage();
            header("LOCATION: customers.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Sorry, you're not an admin. Only admin can edit this form.";
        header("LOCATION: customers.php");
        exit();
      } 
}
 
  $conn = null;
 
?>