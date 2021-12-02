<nav class="navbar navbar-default" style="background-color: #101820ff">
  <div class="container-fluid">
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--<a class="navbar-brand" href="index.php" style="color: #F9FAF5"><font face="Serif" style="font-size:2vw">SYALECTRIC</font></a>-->
    </div>
    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="index.php" style="color: #F9FAF5">Home</a></li> 
      <!--<li><a href="search.php" style="color: #F9FAF5">Search</a></li>-->
      <li><a href="products.php" style="color: #F9FAF5">Products</a></li>
      <li><a href="customers.php" style="color: #F9FAF5">Customers</a></li>
      <li><a href="staffs.php" style="color: #F9FAF5">Staffs</a></li>
      <li><a href="orders.php" style="color: #F9FAF5">Orders</a></li>
      <li><a href="search.php" style="color: #F9FAF5">Search</a></li>

      <form action="#" method="POST" id="searchForm" class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" id="inputSearch" name="search" placeholder="Philips 1499 CH001" autocomplete="off" size="50" required/>
           
        </div>
        <button type="submit" class="btn btn-default active" formaction="search.php" style="background-color: #7f0000; color:white;">Submit</button>
      </form>

      <!--<li><form action="#" method="POST" id="searchForm" class="navbar-form navbar-left">
        <div class="form-group">
           <input type="text" class="form-control" id="inputSearch" name="search" placeholder="Philips 1499 CH001" autocomplete="off" required/>
           <span id="helpBlock2" class="help-block"></span>
        </div>

        <button type="submit" class="btn btn-default" formaction="search.php">Search</button>
      </form></li>-->
    </ul>
      <ul class="nav navbar-nav navbar-right">
        <h5 style="color: #F9FAF5">Hello <?php echo $_SESSION['user']['FLD_STAFF_NAME']; ?> | <?php echo $_SESSION['user']['FLD_USER_LEVEL']; ?></h5>
        <ul class="nav navbar-nav navbar-right">
         <span class="glyphicon glyphicon-log-out" style="font-size:15px;color:white" aria-hidden="true" role="button"></span>
         <a href="logout.php" style="color: #F9FAF5"> Log Out &nbsp; &nbsp;</a></ul>
        <!--<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #F9FAF5"><?php echo $_SESSION['user']['FLD_STAFF_NAME']; ?> | Menu</span></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php">Log Out</a></li>-->
          </ul>
        </li>
      </ul> 
    </div>
  </div>
</nav>
