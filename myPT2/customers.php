<?php
  include_once 'customers_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Syalectric Ordering System: Customers</title>
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
    <div style="text-decoration: underline;"><font color="#7f0000" face="Fantasy" style="font-size:3vw">Syalectric Customers</font></div>
    <br>
    <form action="customers.php" method="post">
      Customer ID:
      <input name="cid" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_CUSTOMER_ID']; ?>"> <br>
      Customer Name:
        <input name="name" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_CUSTOMER_NAME']; ?>"> <br>
      Phone:
      <input name="phone" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PHONE']; ?>"> <br>
      Email:
      <input name="email" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_EMAIL']; ?>"> <br>
      Address:
      <input name="address" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_ADDRESS']; ?>"> <br>


      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldcid" value="<?php echo $editrow['FLD_CUSTOMER_ID']; ?>">
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
        <td>Customer ID</td>
        <td>Customer Name</td>
        <td>Phone</td>
        <td>Email</td>
        <td>Address</td>
        <td></td>
      </tr>
       <?php
      // Read
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
      foreach($result as $readrow) {
      ?>
      <tr>
        <td><?php echo $readrow['FLD_CUSTOMER_ID']; ?></td>
        <td><?php echo $readrow['FLD_CUSTOMER_NAME']; ?></td>
        <td><?php echo $readrow['FLD_PHONE']; ?></td>
        <td><?php echo $readrow['FLD_EMAIL']; ?></td>
        <td><?php echo $readrow['FLD_ADDRESS']; ?></td>
        <td>
          <a href="customers.php?edit=<?php echo $readrow['FLD_CUSTOMER_ID']; ?>">Edit</a>
          <a href="customers.php?delete=<?php echo $readrow['FLD_CUSTOMER_ID']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
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
  </center>
</body>
</html>