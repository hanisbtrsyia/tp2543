<?php
require_once 'database.php';

if (isset($_SESSION['loggedin']))
    header("LOCATION: index.php");

if (isset($_POST['userid'], $_POST['password'])) {
    $UserID = htmlspecialchars($_POST['userid']);
    $Pass = $_POST['password'];

    if (empty($UserID) || empty($Pass)) {
        $_SESSION['error'] = 'Please fill in the blanks.';
    } else {
        $stmt = $db->prepare("SELECT * FROM tbl_staffs_a175218_pt2 WHERE FLD_STAFF_EMAIL = :id");
        $stmt->bindParam(':id', $UserID);

        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (isset($user['FLD_STAFF_ID'])) {
            if ($user['FLD_STAFF_PASSWORD'] == $Pass) {
                unset($user['FLD_STAFF_PASSWORD']);
                $_SESSION['loggedin'] = true;
                $_SESSION['user'] = $user;

                header("LOCATION: index.php");
                exit();
            } else {
                $_SESSION['error'] = 'Invalid login credentials. Please try again.';
            }
        } else {
            $_SESSION['error'] = 'Account does not exist.';
        }
    }

    header("LOCATION: " . $_SERVER['REQUEST_URI']);
    exit();
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Syalectric: Login</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css">

    body, html {
      height: 100%;
      font-family: Arial, Helvetica, sans-serif;
    }

    * {
      box-sizing: border-box;
    }

    .bg-img {
      /* The image used */
      background-image: url("img_2.jpg");

      min-height: 657px;

      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
    }

    /* Add styles to the form container */
    .container {
      position: absolute;
      right: 0;
      margin: 100px;
      max-width: 400px;
      padding: 16px;
      background-color: white;
    }

    /* Full-width input fields */
    input[type=text], input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }

    label {
    float: left;
    } 

    .centered {
      position: absolute;
      top: 50%;
      left: 25%;
      transform: translate(-50%, -50%);
    }

    .form-inline {
      display: flex;
      flex-flow: row wrap;
      align-items: center;
    }

    hr {
    border: 1px solid black;
    }

    .btn {
        background-color:#000000;
          border-radius: 40px;
          color: white;
          padding: 16px 32px;
          text-align: center;
          margin: 4px 2px;
    }

    </style>

</head>

<body>
    <div class="bg-img">
        <div class="form-inline">
            <div class="centered">
            <font color="1d1d1d" face="Fantasy" style="font-size:4vw">Welcome to Syalectric</font>
            <hr>
            <font color="ab000d" face="Serif" style="font-size:2.4vw">Intelligent Solutions For Your Home.</font></div>
            </div>
<center>
<div class="container login-wrapper">
    <div class="panel panel-default" style="width: 100%">
        <div class="panel-body">
            <div class="text-center">
                <h2 class="text-center">LOGIN</h2>
                Sign in to your account
            </div>
            <hr/>

            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                <div class="form-group">
                    <label for="inputUserID">Username</label>
                    <input type="text" class="form-control" id="inputUserID" name="userid"
                           placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="inputUserPass">Password</label>
                    <input type="password" class="form-control" id="inputUserPass" name="password" placeholder="Password">
                </div>

                <?php
                if (isset($_SESSION['error'])) {
                    echo "<p class='text-danger text-center'>{$_SESSION['error']}</p>";
                    unset($_SESSION['error']);
                }
                ?>
                <button type="submit" class="btn btn-block" >Login</button>
            </form>

            <hr/>
            </div>
        </div>
        </div>
    </div>
</div>
</center>
</body>
</html>