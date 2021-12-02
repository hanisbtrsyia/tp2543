<?php
error_reporting(0);
require_once("db.php");
session_start();
if(!isset($_SESSION['admin_login']))
{
    header("location: ../PTF/index.php");
}
if(isset($_SESSION["sv_login"]))
{
    header("location: svhome.php");
}
if(isset($_SESSION["staff_login"]))
{
    header("location: staff.php");
}
if(isset($_SESSION["admin_login"]))
{
?>
<?php
  include_once 'products_crudAdmin.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Bagstopia : Products</title>

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
  <?php include_once 'nav_barAdmin.php'; ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
          <div class="page-header">
            <h2>Create New Product</h2>
          </div>
        <form action="productsAdmin.php" method="post" class="form-horizontal">
      <div class="form-group">
          <label for="prod_id" class="col-sm-3 control-label">Product ID</label>
          <div class="col-sm-9">
          <input name="prod_id" type="text" class="form-control" id="prod_id" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_id']; ?>"required>
          </div>
        </div>
      <div class="form-group">
          <label for="prod_name" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
              <input name="prod_name" type="text" class="form-control" id="prod_name" placeholder="Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>"required>
              </div>
        </div>
        <div class="form-group">
          <label for="prod_price" class="col-sm-3 control-label">Price (RM) </label>
          <div class="col-sm-9">
             <input name="prod_price" type="number" class="form-control" id="prod_price" placeholder="Price" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>"min="0.0" step="0.01" required>
             </div>
        </div>
      <div class="form-group">
          <label for="prod_brand" class="col-sm-3 control-label">Brand</label>
          <div class="col-sm-9">
                <select name="prod_brand" class="form-control" id="prod_brand"required>
                <option value="">Please select</option>
                  <option value="NEWHEY" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="NEWHEY") echo "selected"; ?>>NEWHEY</option>
                  <option value="EGOELIFE" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="EGOELIFE") echo "selected"; ?>>EGOELIFE</option>
                  <option value="KROSER" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="KROSER") echo "selected"; ?>>KROSER</option>
                  <option value="POKOFO" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="POKOFO") echo "selected"; ?>>POKOFO</option>
                  <option value="ECOSUSI" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="ECOSUSI") echo "selected"; ?>>ECOSUSI</option>
                  <option value="THE CLOWNFISH" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="THE CLOWNFISH") echo "selected"; ?>>THE CLOWNFISH</option>
                  <option value="SAMSONITE" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="SAMSONITE") echo "selected"; ?>>SAMSONITE</option>
                  <option value="NICOLE LEE USA" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="NICOLE LEE USA") echo "selected"; ?>>NICOLE LEE USA</option>
                  <option value="TOCODE" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="TOCODE") echo "selected"; ?>>TOCODE</option>
                </select>
              </div>
        </div>
      <div class="form-group">
          <label for="prod_size" class="col-sm-3 control-label">Size</label>
          <div class="col-sm-9">
          <input name="prod_size" type="text" class="form-control" id="prod_size" placeholder="Size" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_size']; ?>"required>
          </div>
        </div>
      <div class="form-group">
          <label for="prod_category" class="col-sm-3 control-label">Gender</label>
          <div class="col-sm-9">
                <select name="prod_category" class="form-control" id="prod_category" required>
            <option value="">Please select</option>
                  <option value="Male" <?php if(isset($_GET['edit'])) if($editrow['fld_product_category']=="Male") echo "selected"; ?>>Male</option>
                  <option value="Female" <?php if(isset($_GET['edit'])) if($editrow['fld_product_category']=="Female") echo "selected"; ?>>Female</option>
                  <option value="Unisex" <?php if(isset($_GET['edit'])) if($editrow['fld_product_category']=="Unisex") echo "selected"; ?>>Unisex</option>  
                </select>
              </div>
        </div>  
      <div class="form-group">
          <label for="prod_quantity" class="col-sm-3 control-label">Quantity</label>
          <div class="col-sm-9">
          <input name="prod_quantity" type="number" class="form-control" id="prod_quantity" placeholder="Quantity" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_quantity']; ?>" min="0" required>
          </div>
          </div>
           
        <div class="form-group">
          <label for="productimage" class="col-sm-3 control-label">Product Image</label>
          <div class="col-sm-9">
            <input type="file" name="prod_image" id="productimg" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_image']; ?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
                <?php if (isset($_GET['edit'])) { ?>
                <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_id']; ?>">
                <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
                <?php } else { ?>
                <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
                <?php } ?>
                <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
              </div>
      </div>
        </form>
      </div>
  </div>
   <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Products List</h2>
      </div>
      <table class="table table-striped table-bordered">
      <tr>
        <th>Product ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>Brand</th>
          <th>Category</th>
          <th></th>
      </tr>
      <?php
      // Read
       $per_page = 6;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_products_a175275 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>
      <tr>
        <td><?php echo $readrow['fld_product_id']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['fld_product_price']; ?></td>
        <td><?php echo $readrow['fld_product_brand']; ?></td>
        <td><?php echo $readrow['fld_product_category']; ?></td>
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
  Details
</button>
        
        
         <!-- <a href="products_detailsAdmin.php?prod_id=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>-->
          <a href="productsAdmin.php?edit=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="productsAdmin.php?delete=<?php echo $readrow['fld_product_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
    </table>
  </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a175275");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="productsAdmin.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"productsAdmin.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"productsAdmin.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="productsAdmin.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
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
      url: 'products_detailsAdmin.php',
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