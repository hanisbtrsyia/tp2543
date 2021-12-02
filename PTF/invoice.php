<?php
  include_once 'database.php';
?>
<!--<!DOCTYPE html>
<html>
<head>
  <title>Bagstopia : Invoice</title>
</head>
<body>
  <center>
  	<div><br>	
  		<b>Bagstopia Sdn Bhd</b> <br>
  		B-12-04, Jalan Kejora 2, <br>
  		Bandar Mahkota Cheras, <br>
  		43200 Cheras, Selangor. <br>
  		Tel : +603-9021 1480 <br>
  	</div>
    <hr>
    <br>
    <div align="center">
    	<table>-->
        <?php 
        try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM tbl_orders_a175275, tbl_staffs_a175275,
        tbl_customers_a175275, tbl_orders_details_a175275 WHERE
        tbl_orders_a175275.fld_staff_id = tbl_staffs_a175275.fld_staff_id AND
        tbl_orders_a175275.fld_cust_id = tbl_customers_a175275.fld_cust_id AND
        tbl_orders_a175275.fld_order_id = tbl_orders_details_a175275.fld_order_id AND
        tbl_orders_a175275.fld_order_id = :order_id");
      $stmt->bindParam(':order_id', $order_id, PDO::PARAM_STR);
      $order_id = $_GET['order_id'];
      $stmt->execute();
      $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
      }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Invoice</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
 
<div class="row">
<div class="col-xs-6 text-center">
  <br>
    <img src="logo.png" width="40%" height="40%">
</div>
<div class="col-xs-6 text-right">
  <h1>INVOICE</h1>
  <h5>Order: <?php echo $readrow['fld_order_id'] ?></h5>
  <h5>Date:<?php echo $readrow['fld_order_date'] ?></h5>
</div>
</div>
<hr>

<div class="row">
  <div class="col-xs-5">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>From: Bagstopia Sdn. Bhd.</h4>
      </div>
      <div class="panel-body">
        <p>
        
        B-12-04, Jalan Kejora 2, <br>
  		Bandar Mahkota Cheras, <br>
  		43200 Cheras, Selangor. <br>
  		Tel : +603-9021 1480 <br>
        
        </p>
      </div>
    </div>
  </div>
    <div class="col-xs-5 col-xs-offset-2 text-right">
        <div class="panel panel-default">
            <div class="panel-heading">
              <h4>To : <?php echo $readrow['fld_cust_name']?></h4>
            
            </div>
            <div class="panel-body">
        <p>
        <?php echo $readrow['fld_cust_email']?> <br>
        <?php echo $readrow['fld_cust_phone']?> <br>
         <br>
         <br>
        </p>
            </div>
        </div>
    </div>
</div>
 <table class="table table-bordered">
  <tr>
    <th>No</th>
    <th>Product</th>
    <th class="text-right">Quantity</th>
    <th class="text-right">Price (RM)/Unit</th>
    <th class="text-right">Total (RM)</th>
  </tr>
      <?php
      $grandtotal = 0;
      $counter = 1;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_orders_details_a175275,
            tbl_products_a175275 where 
            tbl_orders_details_a175275.fld_product_id = tbl_products_a175275.fld_product_id AND
            fld_order_id = :order_id");
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_STR);
          $order_id = $_GET['order_id'];
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
        <td><?php echo $detailrow['fld_product_name']; ?></td>
        <td><?php echo $detailrow['fld_order_detail_qty']; ?></td>
        <td><?php echo $detailrow['fld_product_price']; ?></td>
        <td><?php echo $detailrow['fld_product_price']*$detailrow['fld_order_detail_qty']; ?></td>
      </tr>
      <?php
        $grandtotal = $grandtotal + $detailrow['fld_product_price']*$detailrow['fld_order_detail_qty'];
        $counter++;
      } // while
      $conn = null;
      ?>
      <tr>
        <td colspan="4" align="right">Grand Total</td>
        <td><?php echo $grandtotal ?></td>
      </tr>
    </table>
    <div class="row">
  <div class="col-xs-5">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>Bank Details</h4>
      </div>
      <div class="panel-body">
        <p>Your Name</p>
        <p>Bank Name</p>
        <p>SWIFT : </p>
        <p>Account Number : </p>
        <p>IBAN : </p>
      </div>
    </div>
    </div>
  <div class="col-xs-7">
    <div class="span7">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>Contact Details</h4>
        </div>
        <div class="panel-body">
          <p> Staff: <?php echo $readrow['fld_staff_name'] ?> </p>
          <p> Email: <?php echo $readrow['fld_staff_email'] ?> </p>
          <p><br></p>
          <p><br></p>
          <p>Computer-generated invoice. No signature is required.</p>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>