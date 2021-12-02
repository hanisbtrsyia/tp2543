<?php
error_reporting(0);
require_once("db.php");
session_start();
if(isset($_SESSION['admin_login']))
{
    header("location: admin.php");
}
if(isset($_SESSION["sv_login"]))
{
    header("location: svhome.php");
}
if(!isset($_SESSION["staff_login"]))
{
    header("location: ../PTF/index.php");
}
if(isset($_SESSION["staff_login"]))
{
?>
<?php
  include_once 'products_crudstaff.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Bagstopia : Search</title>
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
  <?php include_once 'nav_barStaff.php'; ?>
  <form name="search" method="post" accept-charset="utf-8">    
      <div class="form-group">
          <!--<label for="searchbox" class="col-sm-3 control-label">Search :</label>-->
          <div class="col-sm-9">
          <center><input name="searchbox" type="text" class="form-group-sm" id="sbox" placeholder="Search for a product..." required>
          <button class="btn btn-default" type="submit" name="search" value="Search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button><br><p>*search by name, brand, price and etc.</p><p>(example: "fema" will display female list)</p>
          <!--<input class="form-control" name="search" value="Search" type="submit">-->
        </div>
        </div>
        
        </form></center>
  
    
   <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Search Result</h2>
      </div>
      <table class="table table-striped table-bordered">
      <tr>

         <th>Photo</th> 
         <th>Brand</th>
          <th>Price (RM)</th>
          <th></th>
      </tr>
      <?php
      // Read
	  $totalOP = 0; 
	  if(isset($_POST['searchbox'])){ 
  $search = $_POST['searchbox'];
  $search = preg_replace("#[^0-9a-z]#i", "", $search);
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_products_a175275 WHERE fld_product_id LIKE '%$search%' OR fld_product_name LIKE '%$search%' OR fld_product_price LIKE '%$search%' OR fld_product_brand LIKE '%$search%' OR fld_product_size LIKE '%$search%' OR fld_product_category LIKE '%$search%' OR fld_product_quantity LIKE '%$search%'");
        $stmt->execute();
		$stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
        $totalOP++;
        echo $totalOP;
      ?>
      <tr>
        <td><img src="products/<?php echo $readrow['fld_product_image'] ?>" style="width: 250px" class="img-thumbnail"></td>
        <td><?php echo $readrow['fld_product_brand']; ?></td>
        <td><?php echo $readrow['fld_product_price']; ?></td>

        <td>
        
        <!-- Modal -->
  <div class="modal fade" id="product_<?php echo $readrow['fld_product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalProd" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="ModalProd">Product details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center><img src="products/<?php echo $readrow['fld_product_image'] ?>" style="width: 280px" class="img-thumbnail"></center><br/><br/>
        
     <table class="table"><div class=" col-lg-12 col-sm-5 col-md-4">
      <div class="panel panel-default">
      <div class="panel-heading"><strong>Product Details</strong></div>
      <div class="panel-body">
          Below are specifications of the product.
      </div>
        <tr>
          <th>Product ID: </th>
          <td><?php echo $readrow['fld_product_id'] ?></td>
        </tr>
        <tr>
          <th>Name: </th>
          <td><?php echo $readrow['fld_product_name'] ?></td>
        </tr>
        <tr>
          <th>Price(RM):</th>
          <td><?php echo $readrow['fld_product_price'] ?></td>
        </tr>
        <tr>
          <th>Brand: </th>
          <td><?php echo $readrow['fld_product_brand'] ?></td>
        </tr>
        <tr>
          <th>Size: </th>
          <td><?php echo $readrow['fld_product_size'] ?></td>
        </tr>
        <tr>
          <th>Gender: </th>
          <td><?php echo $readrow['fld_product_category'] ?></td>
        </tr>
        <tr>
          <th>Quantity: </th>
          <td><?php echo $readrow['fld_product_quantity'] ?></td>
        </tr>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        
        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#product_<?php echo $readrow['fld_product_id']; ?>">
  View
</button>
        
        
         
        </td>
      </tr>
      <?php
      }
      
      ?>
    </table>
  </div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
<script type="text/javascript">

    function showDetails(button){
      var prod_id = button.id;
    $.ajax({
      url: 'products_detailsStaff.php',
      type: 'GET',
      data: {"fld_product_id":prod_id},
      success: function(response){
        //alert(response);
        var readrow = JSON.parse(response);
        $("#productid").text(readrow.fld_product_id);
      }
    });
    
  }</script>
</body>
</html>


<?php
}
?>
<?php } ?>