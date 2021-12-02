<?php
  include_once 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Syalectric Ordering System: Products Details</title>
</head>
<body>
   <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {margin:0;}

.navbar {
  overflow: hidden;
  background-color: #101820ff;
  position: fixed;
  top: 0;
  width: 100%;
} 

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

<style>
.container {
  position: relative;
  text-align: center;
  color: white;
}

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #7f0000;
   color: white;
   text-align: center;
}
</style>
</head>
<body>

<div class="navbar">
  <a href="index.php">Home</a>
  <a href="products.php">Products</a>
  <a href="customers.php">Customers</a>
  <a href="staffs.php">Staffs</a>
  <a href="orders.php">Orders</a>
</div>
    <hr>
    <hr>
    <hr>
    <hr>
    <hr>
  <center>
    <div style="text-decoration: underline;"><font color="#000000" face="Fantasy" style="font-size:3vw">Syalectric Product Details</font></div>
    <hr>
    <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_products_a175218_pt2 WHERE FLD_PRODUCT_ID = :pid");
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $pid = $_GET['pid'];
      $stmt->execute();
      $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
      }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
    Product ID: <?php echo $readrow['FLD_PRODUCT_ID'] ?> <br>
    Name: <?php echo $readrow['FLD_PRODUCT_NAME'] ?> <br>
    Model: <?php echo $readrow['FLD_MODEL'] ?> <br>
    Price: RM <?php echo $readrow['FLD_PRICE'] ?> <br>
    Category ID: <?php echo $readrow['FLD_CATEGORY_ID'] ?> <br>
    Warranty (year): <?php echo $readrow['FLD_WARRANTY'] ?> <br>
    Stock Available: <?php echo $readrow['FLD_STOCK_AVAILABLE'] ?> <br>
    <br>
    <img src="products/<?php echo $readrow['FLD_PRODUCT_ID'] ?>.jpg" width="45%" height="45%">
  </center>
</body>
</html>