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
      <input name="oid" type="text" disabled> <br>
      Order Date
      <input name="orderdate" type="date" disabled> <br>
      Staff
      <select name="sid">
        <option value="S001">Arif</option>
        <option value="S002">Athirah</option>
        <option value="S003">Marissa</option>
        <option value="S004">Syade</option>
      </select> <br>
      Customer
      <select name="cid">
        <option value="C001">Adalia</option>
        <option value="C002">Zawawi</option>
        <option value="C003">Nabihah</option>
        <option value="C004">Zali</option>
        <option value="C005">Mira</option>
      </select> <br>
      <br>
       <button style="background-color:#7f0000" type="submit" name="create"><font color="#fbfbfb">Create</button></font>
      <button style="background-color:#7f0000" type="reset"><font color="#fbfbfb">Clear</button></font>
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
      <tr>
        <td>O001</td>
        <td>12-4-2021</td>
        <td>S001</td>
        <td>C001</td>
        <td>
          <a href="orders_details.php">Details</a>
          <a href="orders.php">Edit</a>
          <a href="orders.php">Delete</a>
        </td>
      </tr>
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
  <div class="footer">
  <font color="FAF9F6" face="Serif" >
  <h4>© Koninklijk Syalectric H.S., 2021. All rights reserved.</h4>
</font>
</div>
</body>
</html>