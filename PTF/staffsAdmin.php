<?php
error_reporting(0);
require_once("db.php");
session_start();
if(!isset($_SESSION['admin_login']))
{
    header("location: ../projectkuu/index.php");
}
if(isset($_SESSION["sv_login"]))
{
    header("location: supervisorhome.php");
}
if(isset($_SESSION["staff_login"]))
{
    header("location: staff.php");
}
if(isset($_SESSION["admin_login"]))
{
?>
<?php
  include_once 'staffs_crudadmin.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Bagstopia : Staffs</title>
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
        <h2>Create New Staff</h2>
      </div>
    <form action="staffsAdmin.php" method="post" class="form-horizontal">
      <div class="form-group">
        <label for="staffid" class="col-sm-3 control-label" >Staff ID</label>
        <div class="col-sm-9">
        <input name="staff_id" type="text" class="form-control" id="staffid" placeholder="Staff ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_id']; ?>" required>
        </div>
        </div>
        <div class="form-group">
          <label for="staffname" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
            <input name="staff_name" type="text" class="form-control" id="staffname" placeholder="Staff Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_name']; ?>" required>
            </div>
        </div>
       <div class="form-group">
          <label for="staffrole" class="col-sm-3 control-label">Role</label>
          <div class="col-sm-9">
          <div class="radio">
            <label>
              <input name="staff_role" type="radio" id="staffrole" value="Staff" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_role']=="staff") echo "checked"; ?> required> Staff
              </label>
          </div>
          <div class="radio">
            <label>
              <input name="staff_role" type="radio" id="staffrole" value="Admin" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_role']=="Admin") echo "checked"; ?> required> Admin
              </div>
               <div class="radio">
            <label>
              <input name="staff_role" type="radio" id="staffrole" value="Supervisor" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_role']=="Supervisor") echo "checked"; ?> required> Supervisor
              </div>
          </div>
      </div>
        <div class="form-group">
          <label for="staffemail" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-9">
            <input name="staff_email" type="text" class="form-control" id="staffemail" placeholder="Staff Email" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_email']; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label for="staffpass" class="col-sm-3 control-label">Password</label>
          <div class="col-sm-9">
            <input name="staff_pass" class="form-control" id="staffpass" placeholder="Password" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_pass']; ?>" required>
          </div>
        </div>    
        <div class="form-group">
          <label for="staffgender" class="col-sm-3 control-label">Gender</label>
          <div class="col-sm-9">
          <div class="radio">
            <label>
              <input name="staff_gender" type="radio" id="staffgender" value="Male" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_gender']=="Male") echo "checked"; ?> required> Male
              </label>
          </div>
          <div class="radio">
            <label>
              <input name="staff_gender" type="radio" id="staffgender" value="Female" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_gender']=="Female") echo "checked"; ?> required> Female
              </div>
          </div>
      </div>
              <div class="form-group">
          <label for="staffphone" class="col-sm-3 control-label">No Phone</label>
          <div class="col-sm-9">
            <input name="staff_phone" type="text" class="form-control" id="staffphone" placeholder="example: 012-345 6789" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_phone']; ?>">
          </div>
          </div>
            <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <?php if (isset($_GET['edit'])) { ?>
              <input type="hidden" name="oldsid" value="<?php echo $editrow['fld_staff_id']; ?>">
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
        <h2>Staff List</h2>
      </div>
      <table class="table table-striped table-bordered">
    <tr>
        <td>Staff ID</td>
        <td>Staff Name</td>
        <td>Role</td>
        <td>Email</td>
        <td>Password</td>
        <td>Gender</td>
        <td>Phone Number</td>
        <td></td>
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
          $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a175275 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>
      <tr>
        <td><?php echo $readrow['fld_staff_id']; ?></td>
        <td><?php echo $readrow['fld_staff_name']; ?></td>
        <td><?php echo $readrow['fld_staff_role']; ?></td>
        <td><?php echo $readrow['fld_staff_email']; ?></td>
        <td><?php echo $readrow['fld_staff_pass']; ?></td>
        <td><?php echo $readrow['fld_staff_gender']; ?></td>
        <td><?php echo $readrow['fld_staff_phone']; ?></td>
        <td>
          <a href="staffsAdmin.php?edit=<?php echo $readrow['fld_staff_id']; ?>" class="btn btn-success btn-xs" role="button">Edit</a>
          <a href="staffsAdmin.php?delete=<?php echo $readrow['fld_staff_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
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
            $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a175275");
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
            <li><a href="staffsAdmin.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"staffsAdmin.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"staffsAdmin.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="staffsAdmin.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
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
</body>
</html>
<?php
}
?>