<?php
  include_once 'products_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Syalectric Ordering System: Products</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/main.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     <style>
        input[type="file"] {
            display: none;
        }
        th {
        background-color:#7f0000;
        color:#fbfbfb;
        border: 2px solid black;
        }
        tr {
          border: 2px solid black;
        }
        table {
                background-color:#eeeeee;
              }
    </style>
</head>
<body>
  <div style="background-image: url('img_13.jpg');">
<?php include_once 'nav_bar.php'; ?> 

<div class="container" style="color:black">
  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
         <center><div><font color="#7f0000" face="Fantasy" style="font-size:3vw">Create New Product</font></div></center>
      </div>

       <?php
       if (isset($_SESSION['error'])) {
          echo "<p class='text-danger text-center'>{$_SESSION['error']}</p>";
          unset($_SESSION['error']);
                    }
                    ?>
      </div>
      <div class="col-md-8">
   <form action="products.php" method="post" class="form-horizontal" enctype="multipart/form-data">
         <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">ID</label>
          <div class="col-sm-9">
           <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRODUCT_ID']; ?>" required>
        </div>
        </div>
        <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
           <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRODUCT_NAME']; ?>" required>
        </div>
        </div>
        <div class="form-group">
          <label for="model" class="col-sm-3 control-label">Model</label>
          <div class="col-sm-9">
           <input name="model" type="text" class="form-control" id="model" placeholder="Model" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_MODEL']; ?>" required>
        </div>
        </div>
        <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">Price (RM)</label>
          <div class="col-sm-9">
            <input name="price" type="number" class="form-control" id="productprice" placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_PRICE']; ?>" min="0.0" step="0.01" required>
        </div>
        </div>
        <div class="form-group">
          <label for="category" class="col-sm-3 control-label">Category ID</label>
          <div class="col-sm-9">
          <select name="category" class="form-control" id="category" required>
            <option value="">Please select</option>
            <option value="CH001" <?php if(isset($_GET['edit'])) if($editrow['FLD_CATEGORY_ID']=="CH001") echo "selected"; ?>>CH001</option>
            <option value="CH002" <?php if(isset($_GET['edit'])) if($editrow['FLD_CATEGORY_ID']=="CH002") echo "selected"; ?>>CH002</option>
            <option value="CH003" <?php if(isset($_GET['edit'])) if($editrow['FLD_CATEGORY_ID']=="CH003") echo "selected"; ?>>CH003</option>
            <option value="CH004" <?php if(isset($_GET['edit'])) if($editrow['FLD_CATEGORY_ID']=="CH004") echo "selected"; ?>>CH004</option>
            <option value="CH005" <?php if(isset($_GET['edit'])) if($editrow['FLD_CATEGORY_ID']=="CH005") echo "selected"; ?>>CH005</option>
            <option value="CH006" <?php if(isset($_GET['edit'])) if($editrow['FLD_CATEGORY_ID']=="CH006") echo "selected"; ?>>CH006</option>
            <option value="CH007" <?php if(isset($_GET['edit'])) if($editrow['FLD_CATEGORY_ID']=="CH007") echo "selected"; ?>>CH007</option>
            <option value="CH008" <?php if(isset($_GET['edit'])) if($editrow['FLD_CATEGORY_ID']=="CH008") echo "selected"; ?>>CH008</option>
          </select>
        </div>
        </div>   
        <div class="form-group">
          <label for="warranty" class="col-sm-3 control-label">Warranty (year)</label>
          <div class="col-sm-9">
           <input name="warranty" type="number" class="form-control" id="warranty" placeholder="Warranty" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_WARRANTY']; ?>"  min="0" required>
        </div>
        </div> 
        <div class="form-group">
          <label for="stock" class="col-sm-3 control-label">Stock Available</label>
          <div class="col-sm-9">
           <input name="stock" type="number" class="form-control" id="stock" placeholder="Stock Available" value="<?php if(isset($_GET['edit'])) echo $editrow['FLD_STOCK_AVAILABLE']; ?>"  min="0" required>
        </div>
        </div>

      <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
          <?php if (isset($_GET['edit'])) { ?>
          <input type="hidden" name="oldpid" value="<?php echo $editrow['FLD_PRODUCT_ID']; ?>">
          <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
          <?php } else { ?>
          <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
          <?php } ?>
          <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
        </div>
      </div>
    </div>
      <div class="col-md-4" style="height: 100%">
      <div class="thumbnail dark-1">
      <img src="products/<?php echo(isset($_GET['edit']) ? $editrow['FLD_PRODUCT_IMAGE'] : '') ?>" onerror="this.onerror=null;this.src='nophoto.png';" id="productPhoto" alt="Product Image" style="width:200%; height: 220px;">
      <div class="caption text-center">
      <h3 id="productImageTitle" style="word-break: break-all;">Product Image</h3>
      <p>
      <label class="btn btn-danger">
      <input type="file" accept="image/*" name="fileToUpload" id="inputImage" onchange="loadFile(event);"/>
      <span class="glyphicon glyphicon-folder-open " aria-hidden="true"></span><br>Browse
      </label>
      <?php
       if (isset($_GET['edit']) && $editrow['FLD_PRODUCT_IMAGE'] != '') {
       echo '<a href="#" class="btn btn-danger disabled" role="button">Delete</a>';
       }
       ?>
      </p>
    </div>
  </div>
</div>
    </form>
    </div>
  </div>
  
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <div><font color="#000000" face="fantasy" style="font-size:33px">Product List</font></div>
      </div>
      <table class="table" border="1px">
      <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Model</th>
        <th>Price (RM)</th>
        <th></th>
      </tr>
      <?php
      // Read
        $per_page = 5;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $stmt = $conn->prepare("select * from tbl_products_a175218_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>   
      <tr>
        <td><?php echo $readrow['FLD_PRODUCT_ID']; ?></td>
        <td><?php echo $readrow['FLD_PRODUCT_NAME']; ?></td>
        <td><?php echo $readrow['FLD_MODEL']; ?></td>
        <td><?php echo $readrow['FLD_PRICE']; ?></td>
        <td>
         <a href="products_details.php?pid=<?php echo $readrow['FLD_PRODUCT_ID']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
          <?php
           if (isset($_SESSION['user']) && $_SESSION['user']['FLD_USER_LEVEL'] == 'admin') { 
            ?>
          <a href="products.php?edit=<?php echo $readrow['FLD_PRODUCT_ID']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="products.php?delete=<?php echo $readrow['FLD_PRODUCT_ID']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
          <?php } ?>
        </td>
      </tr>
     <?php } ?>
 
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
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a175218_pt2");
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
            <li class="disabled"><span aria-hidden="true">??</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">??</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">??</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">??</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="application/javascript">
        var loadFile = function (event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('productPhoto');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
            document.getElementById('productImageTitle').innerText = event.target.files[0]['name'];
        };
    </script>
</body>
</html>
