<?php
  include_once 'orders_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Syalectric Ordering System: Orders</title>
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
    <div style="text-decoration: underline;"><font color="#7f0000" face="Fantasy" style="font-size:3vw">Syalectric Orders</font></div>
    <br>
    <form action="orders.php" method="post">
      Order ID
       <input name="oid" type="text" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_ORDER_ID']; ?>"> <br>
      Order Date
        <input name="orderdate" type="text" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_DATE_ORDER']; ?>"> <br>
      Staff
      <select name="sid">
         <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a175218_pt2");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $staffrow) {
      ?>
        <?php if((isset($_GET['edit'])) && ($editrow['FLD_STAFF_ID']==$staffrow['FLD_STAFF_ID'])) { ?>
          <option value="<?php echo $staffrow['FLD_STAFF_ID']; ?>" selected><?php echo $staffrow['FLD_STAFF_NAME'];?></option>
        <?php } else { ?>
          <option value="<?php echo $staffrow['FLD_STAFF_ID']; ?>"><?php echo $staffrow['FLD_STAFF_NAME'];?></option>
        <?php } ?>
      <?php
      } // while
      $conn = null;
      ?> 
      </select> <br>
      Customer
      <select name="cid">
        <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_customers_a175218_pt2");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $custrow) {
      ?>
        <?php if((isset($_GET['edit'])) && ($editrow['FLD_CUSTOMER_ID']==$custrow['FLD_CUSTOMER_ID'])) { ?>
          <option value="<?php echo $custrow['FLD_CUSTOMER_ID']; ?>" selected><?php echo $custrow['FLD_CUSTOMER_NAME']?></option>
        <?php } else { ?>
          <option value="<?php echo $custrow['FLD_CUSTOMER_ID']; ?>"><?php echo $custrow['FLD_CUSTOMER_NAME']?></option>
        <?php } ?>
      <?php
      } // while
      $conn = null;
      ?> 
      </select> <br>
        <?php if (isset($_GET['edit'])) { ?>
      <button type="submit" name="update">Update</button>
      <?php } else { ?>
        <br>
      <button type="submit" name="create">Create</button>
      <?php } ?>
      <button type="reset">Clear</button>
    </form>
    <hr>
    <table border="1" cellpadding="4" cellspacing="0" style="background-color:#ffffff">
      <tr>
        <td>Order ID</td>
        <td>Order Date</td>
        <td>Staff ID</td>
        <td>Customer ID</td>
        <td></td>
      </tr>
       <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbl_orders_a175218_pt2, tbl_staffs_a175218_pt2, tbl_customers_a175218_pt2 WHERE ";
        $sql = $sql."tbl_orders_a175218_pt2.FLD_STAFF_ID = tbl_staffs_a175218_pt2.FLD_STAFF_ID and ";
        $sql = $sql."tbl_orders_a175218_pt2.FLD_CUSTOMER_ID = tbl_customers_a175218_pt2.FLD_CUSTOMER_ID";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $orderrow) {
      ?>
      <tr>
        <td><?php echo $orderrow['FLD_ORDER_ID']; ?></td>
        <td><?php echo $orderrow['FLD_DATE_ORDER']; ?></td>
        <td><?php echo $orderrow['FLD_STAFF_ID'] ?></td>
        <td><?php echo $orderrow['FLD_CUSTOMER_ID'] ?></td>
        <td>
          <a href="orders_details.php?oid=<?php echo $orderrow['FLD_ORDER_ID']; ?>">Details</a>
          <a href="orders.php?edit=<?php echo $orderrow['FLD_ORDER_ID']; ?>">Edit</a>
          <a href="orders.php?delete=<?php echo $orderrow['FLD_ORDER_ID']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
    </table>
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
    <br>
  </center>
</body>
</html>