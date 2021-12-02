<?php 
  $findme = array
  (
  array("name" =>"From a friend" ,"abb" => "From a friend" ),
  array("name" =>"I googled you" ,"abb" => "I googled you" ),
  array("name" =>"Just surf on in" ,"abb" => "Just surf on in" ),
  array("name" =>"From your Facebook" ,"abb" => "From your Facebook" ),
  array("name" =>"I clicked an ads" ,"abb" => "I clicked an ads" )
  );
?>

<html>
<head>
  <title>My Guestbook</title>
</head>
 
<body style="background-color:#f1dcf2">
 <center>
  <br>
<form method="post" action="insert.php">
  Nama :
  <input type="text" name="name" size="40" required>
  <br><br>
  Email :
  <input type="text" name="email" size="25" required>
  <br><br>
  How did you find me?
  <select name="findme" required>
    <?php 
      foreach ($findme as $u) {
      echo "<option>".$u['name']."</option>";
      } 
    ?>
      </select>
  <br><br>
  I like your : <br>
  <input type="hidden" name="like_frontpage" value="no">
  <input type="checkbox" name="like_frontpage" value="yes">Front Page <br>
  <input type="hidden" name="like_form" value="no">
  <input type="checkbox" name="like_form" value="yes">Form <br>
  <input type="hidden" name="like_ui" value="no">
  <input type="checkbox" name="like_ui" value="yes">User interface <br><br>
  Comments :<br>
  <textarea name="comment" cols="30" rows="8" required></textarea>
  <br>
  <input type="submit" name="add_form" value="Add a New Comment" style="background-color:#e0a3e3">
  <input type="reset" style="background-color:#e0a3e3">
  <br>
</form>
</center>
</body>
</html>