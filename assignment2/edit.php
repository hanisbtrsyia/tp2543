<?php
 
if (isset($_GET['id'])) {
 
  include "db.php";
 
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
      $stmt = $conn->prepare("SELECT * FROM assignment2 WHERE id = :record_id");
      $stmt->bindParam(':record_id', $id, PDO::PARAM_INT);
      $id = $_GET['id'];
 
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
 
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
<!DOCTYPE html>
<html>
<head>
  <title>My Guestbook</title>
</head>
 
<body style="background-color:#f1dcf2">
 <center>
  <br>
<form method="post" action="update.php">
  Nama :
  <input type="text" name="name" size="40" required value="<?php echo $result["user"]; ?>">
  <br><br>
  Email :
   <input type="text" name="email" size="25" required value="<?php echo $result["email"]; ?>">
  <br><br>
  How did you find me?
    <select name="findme" required>
      <?php 
      if ($result['findme'] == "From a friend"){
      echo '<option value="From a friend" selected>From a friend</option>
            <option value="I googled you">I googled you</option>
            <option value="Just surf on in">Just surf on in</option>
            <option value="From your Facebook">From your Facebook</option>
            <option value="I clicked an ads">I clicked an ads</option>';
    }

    else if ($result['findme'] == "I googled you"){
      echo '<option value="From a friend">From a friend</option>
            <option value="I googled you" selected>I googled you</option>
            <option value="Just surf on in">Just surf on in</option>
            <option value="From your Facebook">From your Facebook</option>
            <option value="I clicked an ads">I clicked an ads</option>';
    }

    else if ($result['findme'] == "Just surf on in"){
      echo '<option value="From a friend">From a friend</option>
            <option value="I googled you">I googled you</option>
            <option value="Just surf on in" selected>Just surf on in</option>
            <option value="From your Facebook">From your Facebook</option>
            <option value="I clicked an ads">I clicked an ads</option>';
    }

    else if ($result['findme'] == "From your Facebook"){
      echo '<option value="From a friend">From a friend</option>
            <option value="I googled you">I googled you</option>
            <option value="Just surf on in">Just surf on in</option>
            <option value="From your Facebook" selected>From your Facebook</option>
            <option value="I clicked an ads">I clicked an ads</option>';
    }

    else if ($result['findme'] == "I clicked an ads"){
      echo '<option value="From a friend">From a friend</option>
            <option value="I googled you">I googled you</option>
            <option value="Just surf on in">Just surf on in</option>
            <option value="From your Facebook">From your Facebook</option>
            <option value="I clicked an ads" selected>I clicked an ads</option>';
    } 
  ?>
        </select>
    <br><br>
  I like your : <br>
    <input type="hidden" name="like_frontpage" value="no">
    <input type="checkbox" name="like_frontpage" value="yes" <?php if ($result['like_frontpage'] == "yes") echo "checked";?>>Front Page <br>
    <input type="hidden" name="like_form" value="no">
    <input type="checkbox" name="like_form" value="yes" <?php if ($result['like_form'] == "yes") echo "checked";?>>Form <br>
    <input type="hidden" name="like_ui" value="no">
    <input type="checkbox" name="like_ui" value="yes" <?php if ($result['like_ui'] == "yes") echo "checked";?>>User interface <br><br>
  Comments :<br>
  <textarea name="comment" cols="30" rows="8" required><?php echo $result["comment"]; ?></textarea>
  <br>
  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
  <input type="submit" name="edit_form" value="Modify Comment" style="background-color:#e0a3e3">
  <input type="reset" style="background-color:#e0a3e3">
  <br>
</form>
  </center>
</body>
</html>