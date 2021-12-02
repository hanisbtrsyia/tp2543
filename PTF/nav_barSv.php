<div align="center">
		<h1>
			Bagstopia
		</h1><h4>Messenger Bags Shop</h4>
	</div><nav class="navbar navbar-default" style="background-color: #333">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php" style="color: #F9FAF5"> Bagstopia </a>
    </div>
 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="svhome.php" style="color: #F9FAF5"> Home </a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php" style="color: #F9FAF5"> Logout <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
    </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #F9FAF5"> Menu <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="searchSV.php"><span class="glyphicon glyphicon-search"aria-hidden="true"></span> Search</a></li>
            <li><a href="productsSv.php"><span class="glyphicon glyphicon-briefcase"aria-hidden="true"></span> Products</a></li>
            <li><a href="customersSv.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Customers</a></li>
            <li><a href="staffsSv.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Staffs</a></li>
            <li><a href="ordersSv.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Orders</a></li><li><a href="changeps.php"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Change Password</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="" style="color: #F9FAF5"><strong> Welcome, <?php echo $_SESSION['sv_login']; ?></strong></a></li>
    </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>