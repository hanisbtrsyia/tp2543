<?php
 
include_once 'database.php';

if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function uploadPhoto($file, $id)
{
    $target_dir = "products/";
    $target_file = $target_dir . basename($file["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowedExt = ['jpg', 'jpeg', 'gif'];

    $newfilename = "{$id}.{$imageFileType}";

    /*
     * 0 = image file is a fake image
     * 1 = file is too large.
     * 2 = PNG & GIF files are allowed
     * 3 = Server error
     * 4 = No file were uploaded
     */

    if ($file['error'] == 4)
        return 4;

    // Check if image file is an actual image or fake image
    if (!getimagesize($file['tmp_name']))
        return 0;

    // Check file size
    if ($file["size"] > 10000000)
        return 1;

    // Allow certain file formats
    if (!in_array($imageFileType, $allowedExt))
        return 2;

    if (!move_uploaded_file($file["tmp_name"], $target_dir . $newfilename))
        return 3;

    return array('status' => 200, 'name' => $newfilename, 'ext' => $imageFileType);
}

//Create
if (isset($_POST['create'])) {
    $uploadStatus = uploadPhoto($_FILES['fileToUpload'], $_POST['pid']);
//Create
if (isset($uploadStatus['status'])) {
  if (isset($_SESSION['user']) && $_SESSION['user']['FLD_USER_LEVEL'] == 'admin') {
 
  try {
 
      $stmt = $conn->prepare("INSERT INTO tbl_products_a175218_pt2(FLD_PRODUCT_ID,
        FLD_PRODUCT_NAME, FLD_MODEL, FLD_PRICE, FLD_CATEGORY_ID, 
        FLD_WARRANTY, FLD_STOCK_AVAILABLE, FLD_PRODUCT_IMAGE) VALUES(:pid, :name, :model, :price, :category,
        :warranty, :stock, :image)");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':model', $model, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':category', $category, PDO::PARAM_STR);
      $stmt->bindParam(':warranty', $warranty, PDO::PARAM_INT);
      $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
      $stmt->bindParam(':image', $uploadStatus['name']);
       
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
      $_SESSION['error'] = "Error while creating: " . $e->getMessage();
        }
     }else {
        $_SESSION['error'] = "Sorry, you are not eligible for creating a new product.";
    }
} else {
        if ($uploadStatus == 0)
            $_SESSION['error'] = "Please make sure the file uploaded is an image.";
        elseif ($uploadStatus == 1)
            $_SESSION['error'] = "Sorry, only file with below 10MB are allowed.";
        elseif ($uploadStatus == 2)
            $_SESSION['error'] = "Sorry, only JPG & GIF files are allowed.";
        elseif ($uploadStatus == 3)
            $_SESSION['error'] = "Sorry, there was an error uploading your file.";
        elseif ($uploadStatus == 4)
            $_SESSION['error'] = 'Please upload an image.';
        else
            $_SESSION['error'] = "An unknown error has been occurred.";
    }

    header("LOCATION: {$_SERVER['REQUEST_URI']}");
    exit();
}
 
//Update
if (isset($_POST['update'])) {
 
  try {
 
      $stmt = $conn->prepare("UPDATE tbl_products_a175218_pt2 SET FLD_PRODUCT_ID = :pid,
        FLD_PRODUCT_NAME = :name, FLD_MODEL = :model, FLD_PRICE = :price,
        FLD_CATEGORY_ID = :category, FLD_WARRANTY = :warranty, FLD_STOCK_AVAILABLE = :stock WHERE FLD_PRODUCT_ID = :oldpid");
     
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
 
    // Image Upload
        $flag = uploadPhoto($_FILES['fileToUpload'], $pid);
        if (isset($flag['status'])) {
            $stmt = $db->prepare("UPDATE tbl_products_a175218_pt2 SET FLD_PRODUCT_IMAGE = :image WHERE FLD_PRODUCT_ID = :pid");

            $stmt->bindParam(':image', $flag['name']);
            $stmt->bindParam(':pid', $pid);
            $stmt->execute();

            // Rename file after upload (IF NEEDED)
            // rename("products/{$uploadStatus['name']}", "products/{$oldpid}.{$uploadStatus['ext']}");
        } elseif ($flag != 4) {
            if ($flag == 0)
                $_SESSION['error'] = "Please make sure the file uploaded is an image.";
            elseif ($flag == 1)
                $_SESSION['error'] = "Sorry, only file with below 10MB are allowed.";
            elseif ($flag == 2)
                $_SESSION['error'] = "Sorry, only JPG & GIF files are allowed.";
            elseif ($flag == 3)
                $_SESSION['error'] = "Sorry, there was an error uploading your file.";
            else
                $_SESSION['error'] = "An unknown error has been occurred.";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    } catch (Exception $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    if (isset($_SESSION['error']))
        header("LOCATION: {$_SERVER['REQUEST_URI']}");
    else
        header("Location: products.php");

    exit();
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
      $pid = $_GET['delete'];

        // Select Product Image Name
        $query = $db->query("SELECT FLD_PRODUCT_IMAGE FROM tbl_products_a175218_pt2 WHERE FLD_PRODUCT_ID = '{$pid}'")->fetch(PDO::FETCH_ASSOC);

        // Check if selected product id exists .
        if (isset($query['FLD_PRODUCT_IMAGE'])) {
            // Delete Query
            $stmt = $db->prepare("DELETE FROM tbl_products_a175218_pt2 WHERE FLD_PRODUCT_ID = :pid");
            $stmt->bindParam(':pid', $pid);

            $stmt->execute();

            // Delete Image
            unlink("products/{$query['FLD_PRODUCT_IMAGE']}");
        }
 
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

        if (empty($editrow['FLD_PRODUCT_IMAGE']))
            $editrow['FLD_PRODUCT_IMAGE'] = $editrow['FLD_PRODUCT_ID'] . '.jpg';
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
  $conn = null;
?>