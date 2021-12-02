<?php
 
if (isset($_POST['edit_form'])) {
 
  include "db.php";
 
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
    $stmt = $conn->prepare("UPDATE assignment2 SET user = :name, email = :email, comment = :comment, findme = :findme, like_frontpage = :like_frontpage, like_form = :like_form, like_ui = :like_ui WHERE id = :record_id");
 
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':record_id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':findme', $findme, PDO::PARAM_STR);
    $stmt->bindParam(':like_frontpage', $like_frontpage, PDO::PARAM_STR);
    $stmt->bindParam(':like_form', $like_form, PDO::PARAM_STR);
    $stmt->bindParam(':like_ui', $like_ui, PDO::PARAM_STR);
       
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    $id = $_POST['id'];
    $findme = $_POST['findme'];
    $like_frontpage = $_POST['like_frontpage'];
    $like_form = $_POST['like_form'];
    $like_ui = $_POST['like_ui'];
 
    $stmt->execute();
     
    header("Location:list.php");
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