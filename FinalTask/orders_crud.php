<?php
 
include_once 'database.php';

if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_orders_a175218_pt2(FLD_ORDER_ID, FLD_STAFF_ID,
      FLD_CUSTOMER_ID) VALUES(:oid, :sid, :cid)");
   
    $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
       
    $oid = uniqid('O', true);
    $sid = $_POST['sid'];
    $cid = $_POST['cid'];
     
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Update
if (isset($_POST['update'])) {
    if (isset($_SESSION['user']) && $_SESSION['user']['FLD_USER_LEVEL'] == 'admin') {
  try {
 
    $stmt = $conn->prepare("UPDATE tbl_orders_a175218_pt2 SET FLD_STAFF_ID = :sid,
      FLD_CUSTOMER_ID = :cid WHERE FLD_ORDER_ID = :oid");
   
    $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
       
    $oid = $_POST['oid'];
    $sid = $_POST['sid'];
    $cid = $_POST['cid'];
     
    $stmt->execute();
 
    header("Location: orders.php");
    }
 
  catch(PDOException $e)
  {
    $_SESSION['error'] = "Error while updating: " . $e->getMessage();
            header("LOCATION: orders.php");
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
 
    $stmt = $conn->prepare("DELETE FROM tbl_orders_a175218_pt2 WHERE FLD_ORDER_ID = :oid");
   
    $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
       
    $oid = $_GET['delete'];
     
    $stmt->execute();
 
    } catch (PDOException $e) {
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
 
    $stmt = $conn->prepare("SELECT * FROM tbl_orders_a175218_pt2 WHERE FLD_ORDER_ID = :oid");
   
    $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
       
    $oid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
   catch (PDOException $e) {
            $_SESSION['error'] = "Error: " . $e->getMessage();
            header("LOCATION: orders.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Sorry, you're not an admin. Only admin can edit this form.";
        header("LOCATION: orders.php");
        exit();
      } 
}
 
  $conn = null;
?>