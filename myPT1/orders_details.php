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
    Order ID: O001<br>
    Order Date: 12-4-2021 <br>
    Staff: Arif <br>
    Customer: Adalia <br>
    <br>
    <form action="orders_details.php" method="post">
      Product
      <select name="pid">
        <option value="P001">4K Ultra Slim Smart LED TV</option>
        <option value="P002">Blade close Incredibly gentle</option>
        <option value="P003">Viva Collection Air Fryer</option>
      </select>
      <br>
      Quantity
      <input name="quantity" type="text">
      <br><br>
      <button style="background-color:#7f0000" type="submit" name="addproduct"><font color="#fbfbfb">Add Product</button></font>
      <button style="background-color:#7f0000" type="reset"><font color="#fbfbfb">Clear</button></font>
    </form>
    <br>
    <table border="1" cellpadding="4" cellspacing="0" style="background-color:#ffffff">
      <tr>
        <td>Order Details ID</td>
        <td>Product</td>
        <td>Quantity</td>
        <td></td>
      </tr>
      <tr>
        <td>O001</td>
        <td>4K Ultra Slim Smart LED TV</td>
        <td>1</td>
        <td>
          <a href="orders_details.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>O002</td>
        <td>Blade close Incredibly gentle</td>
        <td>2</td>
        <td>
          <a href="orders_details.php">Delete</a>
        </td>
      </tr>
    </table>
    <br>
    <a href="invoice.php" target="_blank"><font color="#000000">Generate Invoice</a></font>
  </center>
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
  <div class="footer">
  <font color="FAF9F6" face="Serif" > 
  <h4>© Koninklijk Syalectric H.S., 2021. All rights reserved.</h4>
</font>
</div>
</body>
</html>