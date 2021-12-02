<?php
  include_once 'products_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Syalectric Ordering System: Products</title>
</head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {margin:0; background-color: #ffffff}

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
<div style="background-color: #fbfbfb" class="container-fluid bg-success text-center">
  <div style="background-image: url('img_3.jpg');">
    <hr>
    <hr>
    <hr>
    <hr>
    <hr>
  <center>
    <div style="text-decoration: underline;"><font color="#7f0000" face="Fantasy" style="font-size:3vw">Syalectric Products</font></div>
    <br>
    <form action="products.php" method="post">
      Product ID:
       <input name="pid" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRODUCT_ID']; ?>"> <br>
      Name:
      <input name="name" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRODUCT_NAME']; ?>"> <br>
      Model:
      <input name="model" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_MODEL']; ?>"> <br>
      Price (RM):
      <input name="price" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRICE']; ?>"> <br>
      Category ID:
      <select name="category">
         <option value="CH001" <?php if(isset($_GET['edit'])) if($editrow['FLD_CATEGORY_ID']=="CH001") echo "selected"; ?>>CH001</option>
         <option value="CH002" <?php if(isset($_GET['edit'])) if($editrow['FLD_CATEGORY_ID']=="CH002") echo "selected"; ?>>CH002</option>
         <option value="CH003" <?php if(isset($_GET['edit'])) if($editrow['FLD_CATEGORY_ID']=="CH003") echo "selected"; ?>>CH003</option>
         <option value="CH004" <?php if(isset($_GET['edit'])) if($editrow['FLD_CATEGORY_ID']=="CH004") echo "selected"; ?>>CH004</option>
         <option value="CH005" <?php if(isset($_GET['edit'])) if($editrow['FLD_CATEGORY_ID']=="CH005") echo "selected"; ?>>CH005</option>
         <option value="CH006" <?php if(isset($_GET['edit'])) if($editrow['FLD_CATEGORY_ID']=="CH006") echo "selected"; ?>>CH006</option>
         <option value="CH007" <?php if(isset($_GET['edit'])) if($editrow['FLD_CATEGORY_ID']=="CH007") echo "selected"; ?>>CH007</option>
         <option value="CH008" <?php if(isset($_GET['edit'])) if($editrow['FLD_CATEGORY_ID']=="CH008") echo "selected"; ?>>CH008</option>
      </select> <br>
      Warranty (year):
      <input name="warranty" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_WARRANTY']; ?>"> <br>
      Stock Available:
      <input name="stock" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STOCK_AVAILABLE']; ?>"> <br>

      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldpid" value="<?php echo $editrow['FLD_PRODUCT_ID']; ?>">
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
        <td>Product ID</td>
        <td>Product Name</td>
        <td>Model</td>
        <td>Price (RM)</td>
        <td>Category ID</td>
        <td>Warranty (year)</td>
        <td>Stock Available</td>
        <td></td>
      </tr>
      <?php
      // Read
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
      foreach($result as $readrow) {
      ?>   
      <tr>
        <td><?php echo $readrow['FLD_PRODUCT_ID']; ?></td>
        <td><?php echo $readrow['FLD_PRODUCT_NAME']; ?></td>
        <td><?php echo $readrow['FLD_MODEL']; ?></td>
        <td><?php echo $readrow['FLD_PRICE']; ?></td>
        <td><?php echo $readrow['FLD_CATEGORY_ID']; ?></td>
        <td><?php echo $readrow['FLD_WARRANTY']; ?></td>
        <td><?php echo $readrow['FLD_STOCK_AVAILABLE']; ?></td>
        <td>
          <a href="products_details.php?pid=<?php echo $readrow['FLD_PRODUCT_ID']; ?>">Details</a>
          <a href="products.php?edit=<?php echo $readrow['FLD_PRODUCT_ID']; ?>">Edit</a>
          <a href="products.php?delete=<?php echo $readrow['FLD_PRODUCT_ID']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
    </table>
  </center>
</body>
</html>