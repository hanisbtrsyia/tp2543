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
    <div style="text-decoration: underline;"><font color="#7f0000" face="Fantasy" style="font-size:3vw">Syalectric Customers</font></div>
    <br>
    <form action="customers.php" method="post">
      Customer ID
      <input name="cid" type="text"> <br>
      Customer Name
      <input name="cname" type="text"> <br>
      Phone Number
      <input name="phone" type="text"> <br>
      Email
      <input name="email" type="text"> <br>
      Address
      <input name="address" type="text"> <br>
      <br>
      <button style="background-color:#7f0000" type="submit" name="create"><font color="#fbfbfb">Create</button></font>
      <button style="background-color:#7f0000" type="reset"><font color="#fbfbfb">Clear</button></font>
    </form>
    
    <hr>
    <table border="1" cellpadding="4" cellspacing="0" style="background-color:#ffffff">
      <tr>
        <td>Customer ID</td>
        <td>Customer Name</td>
        <td>Phone Number</td>
        <td>Email</td>
        <td>Address</td>
        <td></td>
      </tr>
      <tr>
        <td>C001</td>
        <td>Adalia</td>
        <td>+60193883167</td>
        <td>nisadalia@gmail.com</td>
        <td>27, Puncak Permai 2/3, Taman Damai Saujana 43000, Kajang, Selangor</td>
        <td>
          <a href="customers.php">Edit</a>
          <a href="customers.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>C002</td>
        <td>Zawawi</td>
        <td>+60187658969</td>
        <td>xzawawi@yahoo.com</td>
        <td>1747, Seraya Permata 5/2, Taman Permai, 43060, Ampang,  Selangor</td>
        <td>
          <a href="customers.php">Edit</a>
          <a href="customers.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>C003</td>
        <td>Nabihah</td>
        <td>+60168776765</td>
        <td>jmndks@gmail.com</td>
        <td>17, Jln Saujana Makmur 1, Saujana Damai 43000, Kajang, Selangor</td>
        <td>
          <a href="customers.php">Edit</a>
          <a href="customers.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>C004</td>
        <td>Zali</td>
        <td>+60133884554</td>
        <td>zali@gmail.com</td>
        <td>56, Jln Puncak Saujana 3/3, Taman Damai Saujana 43000, Kajang, Selangor</td>
        <td>
          <a href="customers.php">Edit</a>
          <a href="customers.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>C005</td>
        <td>Mira</td>
        <td>+60187454568</td>
        <td>mirat@yahoo.com</td>
        <td>275, Jln Kantan Permai, Taman Indah, 43000, Kajang, Selangor</td>
        <td>
          <a href="customers.php">Edit</a>
          <a href="customers.php">Delete</a>
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
  </center>
  <div class="footer">
  <font color="FAF9F6" face="Serif" >
  <h4>© Koninklijk Syalectric H.S., 2021. All rights reserved.</h4>
</font>
</div>
</body>
</html>