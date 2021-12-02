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
 
    $stmt = $conn->prepare("INSERT INTO tbl_staffs_a175218_pt2(FLD_STAFF_ID, FLD_STAFF_NAME, FLD_STAFF_EMAIL, FLD_STAFF_PASSWORD, FLD_USER_LEVEL, FLD_ADDRESS,
      FLD_PHONE) VALUES(:sid, :name, :email, :pass, :role, :address, :phone)");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
    $stmt->bindParam(':role', $role, PDO::PARAM_STR);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
       
    $sid = $_POST['sid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $role = $_POST['role'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
         
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      $_SESSION['error'] = "Error while creating: " . $e->getMessage();
        }
     }else {
        $_SESSION['error'] = "Sorry, you are not eligible for creating a new staff.";
    }

    header("LOCATION: {$_SERVER['REQUEST_URI']}");
    exit();
}
 
//Update
if (isset($_POST['update'])) {
    if (isset($_SESSION['user']) && $_SESSION['user']['FLD_USER_LEVEL'] == 'admin') {
  try {
 
    $stmt = $conn->prepare("UPDATE tbl_staffs_a175218_pt2 SET
      FLD_STAFF_ID = :sid, FLD_STAFF_NAME = :name,  FLD_STAFF_EMAIL = :email, FLD_STAFF_PASSWORD = :pass, FLD_USER_LEVEL = :role, FLD_ADDRESS = :address,
      FLD_PHONE = :phone WHERE FLD_STAFF_ID = :oldsid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
    $stmt->bindParam(':role', $role, PDO::PARAM_STR);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':oldsid', $oldsid, PDO::PARAM_STR);
       
    $sid = $_POST['sid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $role = $_POST['role'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $oldsid = $_POST['oldsid'];
         
    $stmt->execute();
 
    header("Location: staffs.php");
    }
 
  catch(PDOException $e)
  {
      $_SESSION['error'] = "Error while updating: " . $e->getMessage();
            header("LOCATION: staffs.php");
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
 
    $stmt = $conn->prepare("DELETE FROM tbl_staffs_a175218_pt2 where FLD_STAFF_ID = :sid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
       
    $sid = $_GET['delete'];
     
    $stmt->execute();
 
     }catch (PDOException $e) {
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
 
    $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a175218_pt2 where FLD_STAFF_ID = :sid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
       
    $sid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch (PDOException $e) {
            $_SESSION['error'] = "Error: " . $e->getMessage();
            header("LOCATION: staffs.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Sorry, you're not an admin. Only admin can edit this form.";
        header("LOCATION: staffs.php");
        exit();
      } 
}
 
  $conn = null;
 
?>