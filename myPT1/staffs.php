<!DOCTYPE html>
<html>
<head>
  <title>Syalectric Ordering System: Staffs</title>
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
    <div style="text-decoration: underline;"><font color="#7f0000" face="Fantasy" style="font-size:3vw">Syalectric Staffs</font></div>
    <br>
    <form action="staffs.php" method="post">
      Staff ID
      <input name="sid" type="text"> <br>
      Staff Name
      <input name="sname" type="text"> <br>
      Address
      <input name="address" type="text"> <br>
      Phone Number
      <input name="phone" type="text"> <br>
      <br>
      <button style="background-color:#7f0000" type="submit" name="create"><font color="#fbfbfb">Create</button></font>
      <button style="background-color:#7f0000" type="reset"><font color="#fbfbfb">Clear</button></font>
    </form>
    <hr>
    <table border="1" cellpadding="4" cellspacing="0" style="background-color:#ffffff">
      <tr>
        <td>Staff ID</td>
        <td>Staff Name</td>
        <td>Address</td>
        <td>Phone Number</td>
        <td></td>
      </tr>
      <tr>
        <td>S001</td>
        <td>Arif</td>
        <td>17, Jln Impian Makmur Saujana Damai 43000, Kajang, Selangor</td>
        <td>+60178954326</td>
        <td>
          <a href="staffs.php">Edit</a>
          <a href="staffs.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>S002</td>
        <td>Athirah</td>
        <td>1747, Kantan Permata 5/2, Taman Permai, 43000, Kajang, Selangor</td>
        <td>+60186875697</td>
        <td>
          <a href="staffs.php">Edit</a>
          <a href="staffs.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>S003</td>
        <td>Marissa</td>
        <td>56, Puncak Saujana 2/3, Taman Damai Saujana 43000, Kajang,Selangor</td>
        <td>+60189456384</td>
        <td>
          <a href="staffs.php">Edit</a>
          <a href="staffs.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>S004</td>
        <td>Syade</td>
        <td>9, Jalan Impian 9, Taman Indah 43000 Kajang, Selangor</td>
        <td>+60176458865</td>
        <td>
          <a href="staffs.php">Edit</a>
          <a href="staffs.php">Delete</a>
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
  </center>
  <div class="footer">
  <font color="FAF9F6" face="Serif" >
  <h4>© Koninklijk Syalectric H.S., 2021. All rights reserved.</h4>
</font>
</div>
</body>
</html>