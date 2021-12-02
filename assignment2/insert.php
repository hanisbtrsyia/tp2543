<?php
 
if (isset($_POST['add_form'])) {
 
  include "db.php";
 
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
      // Prepare the SQL statement
      $stmt = $conn->prepare("INSERT INTO assignment2(user, email, postdate, posttime, comment, findme, like_frontpage, like_form, like_ui) VALUES (:user, :email, :pdate, :ptime, :comment, :findme, :like_frontpage, :like_form, :like_ui)");
     
      // Bind the parameters
      $stmt->bindParam(':user', $name, PDO::PARAM_STR);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':pdate', $postdate, PDO::PARAM_STR);
      $stmt->bindParam(':ptime', $posttime, PDO::PARAM_STR);
      $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
      $stmt->bindParam(':findme', $findme, PDO::PARAM_STR);
      $stmt->bindParam(':like_frontpage', $like_frontpage, PDO::PARAM_STR);
      $stmt->bindParam(':like_form', $like_form, PDO::PARAM_STR);
      $stmt->bindParam(':like_ui', $like_ui, PDO::PARAM_STR);
       
      // Give value to the variables
      $name = $_POST['name'];
      $email = $_POST['email'];
      $postdate = date("Y-m-d",time());
      $posttime = date("H:i:s",time());
      $comment = $_POST['comment'];
      $findme = $_POST['findme'];
      $like_frontpage = $_POST['like_frontpage'];
      $like_form = $_POST['like_form'];
      $like_ui = $_POST['like_ui'];

    $stmt->execute();
        header("Location:list.php");
     // echo "New records created successfully. "; 
     // echo "<a href='index.php'>Home</a>";
    }
 
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
 
    $conn = null;
  }
else {
  echo "Error: You have execute a wrong PHP. Please contact the web administrator.";
  die();
}
 
 ?>