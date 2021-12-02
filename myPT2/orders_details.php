<?php
  include_once 'orders_details_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Syalectric Ordering System: Order Details</title>
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
<div style="background-image: url('img_3.jpg');">
    <hr>
    <hr>
    <hr>
    <hr>
    <hr>
  <center>
    <div style="text-decoration: underline;"><font color="#7f0000" face="Fantasy" style="font-size:3vw">Order Details</font></div>
    <br>
    <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_orders_a175218_pt2, tbl_staffs_a175218_pt2,
          tbl_customers_a175218_pt2 WHERE
          tbl_orders_a175218_pt2.FLD_STAFF_ID = tbl_staffs_a175218_pt2.FLD_STAFF_ID AND
          tbl_orders_a175218_pt2.FLD_CUSTOMER_ID = tbl_customers_a175218_pt2.FLD_CUSTOMER_ID AND
          FLD_ORDER_ID = :oid");
      $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
        $oid = $_GET['oid'];
      $stmt->execute();
      $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
      }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
    Order ID: <?php echo $readrow['FLD_ORDER_ID'] ?> <br>
    Order Date: <?php echo $readrow['FLD_DATE_ORDER'] ?> <br>
    Staff: <?php echo $readrow['FLD_STAFF_NAME']?> <br> 
    Customer: <?php echo $readrow['FLD_CUSTOMER_NAME']?> <br>
    <br>
    <form action="orders_details.php" method="post">
      Product:
      <select name="pid">
         <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_products_a175218_pt2");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $productrow) {
      ?>
        <option value="<?php echo $productrow['FLD_PRODUCT_ID']; ?>"><?php echo $productrow['FLD_MODEL']." ".$productrow['FLD_PRODUCT_NAME']; ?></option>
      <?php
      }
      $conn = null;
      ?>
      </select>
      <br>
      Quantity:
      <input name="quantity" type="text">
        <input name="oid" type="hidden" value="<?php echo $readrow['FLD_ORDER_ID'] ?>">
        <br><br>
      <button type="submit" name="addproduct">Add Product</button>
      <button type="reset">Clear</button>
    </form>
    <br>
    <table border="1" cellpadding="4" cellspacing="0" style="background-color:#ffffff">
      <tr>
        <td>Order Detail ID</td>
        <td>Product</td>
        <td>Quantity</td>
        <td></td>
      </tr>
       <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_orders_details_a175218_pt2,
            tbl_products_a175218_pt2 WHERE
            tbl_orders_details_a175218_pt2.FLD_PRODUCT_ID = tbl_products_a175218_pt2.FLD_PRODUCT_ID AND
          FLD_ORDER_ID = :oid");
          $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
          $oid = $_GET['oid'];
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $detailrow) {
      ?>
      <tr>
        <td><?php echo $detailrow['FLD_ORDER_DETAIL_ID']; ?></td>
        <td><?php echo $detailrow['FLD_PRODUCT_NAME']; ?></td>
        <td><?php echo $detailrow['FLD_QUANTITY']; ?></td>
        <td>
          <a href="orders_details.php?delete=<?php echo $detailrow['FLD_ORDER_DETAIL_ID']; ?>&oid=<?php echo $_GET['oid']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
    </table>
    <br>
    <a href="invoice.php?oid=<?php echo $_GET['oid']; ?>" target="_blank">Generate Invoice</a>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
  </center>
</body>
</html>