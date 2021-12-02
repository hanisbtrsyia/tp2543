<!DOCTYPE html>
<html>
<head>
  <title>Syalectric Ordering System: Products</title>
</head>
<body>
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

/*
.footer {
   left: 0;
   bottom:0;
   width:100%;
   height:50px;   
   background-color: #7f0000;
   color: white;
   text-align: center;
}*/
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
      <input name="pid" type="text"> <br>
      Product Name: 
      <input name="name" type="text"> <br>
      Model: 
       <input name="model" type="text"> <br>
      Price: 
      <input name="price" type="text"> <br>
      Category ID: 
     <select name="category">
        <option value="CH001">CH001</option>
        <option value="CH002">CH002</option>
        <option value="CH003">CH003</option>
        <option value="CH004">CH004</option>
        <option value="CH005">CH005</option>
        <option value="CH006">CH006</option>
        <option value="CH007">CH007</option>
        <option value="CH008">CH008</option>
      </select> <br>
      Warranty (year): 
      <input name="warranty" type="text"> <br>
      Stock Available: 
      <input name="stockavailable" type="text"> <br>
      <br>
      <button style="background-color:#7f0000" type="submit" name="create"><font color="#fbfbfb">Create</button></font>
      <button style="background-color:#7f0000" type="reset"><font color="#fbfbfb">Clear</button></font>
    </form>
  </body>
     <hr>
    <table border="1" cellpadding="4" cellspacing="0" style="background-color:#fbfbfb">
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
      <tr>
        <td>P001</td>
        <td>4K Ultra Slim Smart LED TV</td>
        <td>55PUT6233S/98</td>
        <td>1,779.00</td>
        <td>CH001</td>
        <td>2</td>
        <td>170</td>
        <td>
          <a href="products_details.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>P002</td>
        <td>Blade close Incredibly gentle</td>
        <td>SP9860/13</td>
        <td>1,599.00</td>
        <td>CH002</td>
        <td>1</td>
        <td>150</td>
        <td>
          <a>Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>
       <tr>
        <td>P003</td>
        <td>Viva Collection Air Fryer</td>
        <td>HD9860/99</td>
        <td>1,225.00</td>
        <td>CH004</td>
        <td>2</td>
        <td>275</td>
        <td>
          <a>Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>
       <tr>
        <td>P004</td>
        <td>Essential baby food maker</td>
        <td>SCF862</td>
        <td>489.00</td>
        <td>CH003</td>
        <td>1</td>
        <td>198</td>
        <td>
          <a>Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>
       <tr>
        <td>P005</td>
        <td>Philips Air Purifier</td>
        <td>AC3033/30</td>
        <td>1,788.00</td>
        <td>CH006</td>
        <td>1</td>
        <td>166</td>
        <td>
          <a>Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>
       <tr>
        <td>P006</td>
        <td>Car driving video recorder</td>
        <td>ADR81BLX1</td>
        <td>1,899.00</td>
        <td>CH007</td>
        <td>3</td>
        <td>40</td>
        <td>
          <a>Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>
       <tr>
        <td>P007</td>
        <td>2-in-1 Thermo pad</td>
        <td>SCF258/02</td>
        <td>73.00</td>
        <td>CH008</td>
        <td>1</td>
        <td>60</td>
        <td>
          <a>Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>
       <tr>
        <td>P008</td>
        <td>Prestige Hair Dryer</td>
        <td>BHD628</td>
        <td>559.00</td>
        <td>CH002</td>
        <td>3</td>
        <td>89</td>
        <td>
          <a>Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>
       <tr>
        <td>P009</td>
        <td>Wireless Headphone</td>
        <td>TAUH202BK/00</td>
        <td>1,088.00</td>
        <td>CH001</td>
        <td>1</td>
        <td>250</td>
        <td>
          <a>Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>
       <tr>
        <td>P010</td>
        <td>Coffee maker</td>
        <td>HD7431/203</td>
        <td>150.00</td>
        <td>CH004</td>
        <td>3</td>
        <td>154</td>
        <td>
          <a>Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>
    </table>
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