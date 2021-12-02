<?php
  include_once 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Syalectric Ordering System: Invoice</title>
</head>
<body>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    div.relative1 {
  position: relative;
  left: 430px;
}
div.relative2 {
  position: relative;
  left: 430px;
}
div.relative3 {
  position: relative;
  left: -155px;
}
 div.absolute1 {
  position: absolute;
  top: 220px;
  right: 360px;
  width: 200px;
  height: 60px;
}
div.absolute2 {
  position: absolute;
  top: 170px;
  right: 395px;
  width: 200px;
  height: 60px;
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
  <div style="background-image: url('img_3.jpg');">
    <br>
    <div class="relative2"><font color="#000000" face="Georgia" style="font-size:3.9vw">INVOICE</font></div>
     <div class="absolute2"><font color="#000000" face="Georgia" style="font-size:1.9vw">SYALECTRIC</font></div>
    
    <div class="relative2"> LOT 8-10A GROUND FLOOR, <br>
    KAJANG LOT PT 3728 <br>
    MUKIM, Saujana Impian, <br>
    43000 Kajang, Selangor <br>
    Email: syalectricv@gmail.com <br>
    Tel: 03-34487659 <br></div>
    <br>
  </div>
    <hr>
    <center>
      <div style="background-color:#fcfffa"> 
    <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM tbl_orders_a175218_pt2, tbl_staffs_a175218_pt2,
        tbl_customers_a175218_pt2, tbl_orders_details_a175218_pt2 WHERE
        tbl_orders_a175218_pt2.FLD_STAFF_ID = tbl_staffs_a175218_pt2.FLD_STAFF_ID AND
        tbl_orders_a175218_pt2.FLD_CUSTOMER_ID = tbl_customers_a175218_pt2.FLD_CUSTOMER_ID AND
        tbl_orders_a175218_pt2.FLD_ORDER_ID = tbl_orders_details_a175218_pt2.FLD_ORDER_ID AND
        tbl_orders_a175218_pt2.FLD_ORDER_ID = :oid");
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
    Order ID: <?php echo $readrow['FLD_ORDER_ID'] ?>
    Order Date: <?php echo $readrow['FLD_DATE_ORDER'] ?>
    <hr>
    Staff: <?php echo $readrow['FLD_STAFF_NAME']?>
    Customer ID: <?php echo $readrow['FLD_CUSTOMER_NAME']?>
    Date: <?php echo date("d M Y"); ?>
    <hr>
    <table border="1" cellpadding="4" cellspacing="0" style="background-color:#FFFFFF">
      <tr>
        <td style="background-color:#7f0000"><font color="#FFFFFF">No</td></font>
        <td style="background-color:#7f0000"><font color="#FFFFFF">Product</td></font>
        <td style="background-color:#7f0000"><font color="#FFFFFF">Quantity</td></font>
        <td style="background-color:#7f0000"><font color="#FFFFFF">Price(RM)/Unit</td></font>
        <td style="background-color:#7f0000"><font color="#FFFFFF">Total(RM)</td></font>
      </tr>
       <?php
      $grandtotal = 0;
      $counter = 1;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_orders_details_a175218_pt2,
            tbl_products_a175218_pt2 where 
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
        <td><?php echo $counter; ?></td>
        <td><?php echo $detailrow['FLD_PRODUCT_NAME']; ?></td>
        <td><?php echo $detailrow['FLD_QUANTITY']; ?></td>
        <td><?php echo $detailrow['FLD_PRICE']; ?></td>
        <td><?php echo $detailrow['FLD_PRICE']*$detailrow['FLD_QUANTITY']; ?></td>
      </tr>
      <?php
        $grandtotal = $grandtotal + $detailrow['FLD_PRICE']*$detailrow['FLD_QUANTITY'];
        $counter++;
      } // while
      $conn = null;
      ?>
      <tr>
        <tr>
        <td colspan="4" align="right" style="background-color:#7f0000"><font color="#FFFFFF">Grand Total</td></font>
        <td><?php echo $grandtotal ?></td>
        </tr>
    </table>
    <hr>
    Computer-generated invoice. No signature is required.
  </center>
  <div class="footer">
  <font color="FAF9F6" face="Serif" > 
  <h4> THANK YOU FOR YOUR BUSINESS.</h4>
</font>
</div>
</body>
</html>