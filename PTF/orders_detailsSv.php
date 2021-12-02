<?php
error_reporting(0);
require_once("db.php");
session_start();
if(isset($_SESSION['admin_login']))
{
    header("location: admin.php");
}
if(!isset($_SESSION["sv_login"]))
{
    header("location: ../PTF/index.php");
}
if(isset($_SESSION["staff_login"]))
{
    header("location: staff.php");
}
if(isset($_SESSION["sv_login"]))
{
?>
<?php
  include_once 'orders_details_crudsv.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bagstopia : Orders</title>
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

  <?php include_once 'nav_barSv.php'; ?>
        <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_orders_a175275, tbl_staffs_a175275,
          tbl_customers_a175275 WHERE
          tbl_orders_a175275.fld_staff_id = tbl_staffs_a175275.fld_staff_id AND
          tbl_orders_a175275.fld_cust_id = tbl_customers_a175275.fld_cust_id AND
          fld_order_id = :order_id");
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
    <div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading"><strong>Order Details</strong></div>
        <div class="panel-body">
        Below are details of the order.
        </div>
        <table class="table">
        <tr>
          <td class="col-xs-4 col-sm-4 col-md-4"><strong>Order ID: </strong></td>
          <td><?php echo $readrow['fld_order_id'] ?></td>
        </tr>
        <tr>
          <td><strong>Order Date: </strong></td>
          <td><?php echo $readrow['fld_order_date'] ?></td>
        </tr>
        <tr>
          <td><strong>Customer: </strong></td>
          <td><?php echo $readrow['fld_cust_name']?></td>
        </tr>
        <tr>
          <td><strong>Staff: </strong></td>
          <td><?php echo $readrow['fld_staff_name']?></td>
        </tr>
        
      </table>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Add a Product</h2>
      </div>
      <form action="orders_detailsSv.php" method="post" class="form-horizontal" name="frmorder" id="forder">
      <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">Product</label>
          <div class="col-sm-9">
      <select name="prod_id" class="form-control" id="productid">
        <option value="">Please select</option>
        <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_products_a175275");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $productrow) {
      ?>
        <option value="<?php echo $productrow['fld_product_id']; ?>"><?php echo $productrow['fld_product_name']; ?></option>
      <?php
      }
      $conn = null;
      ?>
      </select>
       </div>
      </div>
      <div class="form-group">
          <label for="productq" class="col-sm-3 control-label">Quantity</label>
          <div class="col-sm-9"> 
      <input name="prod_quantity" type="number" class="form-control" id="productq" min="1"></div>
      </div>
      <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
      <input name="order_id" type="hidden" value="<?php echo $readrow['fld_order_id'] ?>">
      <button class="btn btn-default" type="submit" name="addproduct"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Add Product</button>
      <button class="btn btn-default" type="reset"<span class="glyphicon glyphicon-erase" aria-hidden="true"></span>Clear</button>
      </div>
      </div>
    </form>
    </div>
      </div>
    <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Products in This Order</h2>
      </div>
      <table class="table table-striped table-bordered">
      <tr>
        <th>Order Detail ID</th>
        <th>Product</th>
        <th>Quantity</th>
        <th></th>
      </tr>
      <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_orders_details_a175275,
            tbl_products_a175275 WHERE
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
        <td><?php echo $detailrow['fld_order_detail_id']; ?></td>
        <td><?php echo $detailrow['fld_product_name']; ?></td>
        <td><?php echo $detailrow['fld_order_detail_qty']; ?></td>
        <td>
          <a href="orders_detailsSv.php?delete=<?php echo $detailrow['fld_order_detail_id']; ?>&order_id=<?php echo $_GET['order_id']; ?>" onclick="return confirm('Are you sure to delete?');"  class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <a href="invoice.php?order_id=<?php echo $_GET['order_id']; ?>" target="_blank" role="button" class="btn btn-primary btn-lg btn-block">Generate Invoice</a>
    </div>
  </div>
  <br>
</div>
<script type="text/javascript">
 
  function validateForm() {
 
      //var x = document.forms["frmorder"]["prod_id"].value;
      //var y = document.forms["frmorder"]["prod_quantity"].value;
      var x = document.getElementById("productid").value;
      var y = document.getElementById("productq").value;
      if (x == null || x == "") {
          alert("Product must be selected");
          //document.forms["frmorder"]["prod_id"].focus();
          document.getElementById("productid").focus();
          return false;
      }
      if (y == null || y == "") {
          alert("Quantity must be filled out");
          //document.forms["frmorder"]["prod_quantity"].focus();
          document.getElementById("productq").focus();
          return false;
      }
       
      return true;
  }
 
</script>
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 
</body>
</html>
<?php
}
else
{
  header("Location: index.php");
}
?>