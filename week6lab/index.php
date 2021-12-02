<!DOCTYPE html>
<html>
<head>
  <title>My Guestbook</title>
</head>
<body>
<br>
<br> 
<div align="center">
  <table width="379" height="286" border="3" bordercolor="#af8eb5">
    <tr>
      <td height="190" bgcolor="#e1bee7">
          <p align="center"><strong>My Guestbook</strong></p>
          <p align="center">Date : <?php echo date("d-m-Y",time()); ?></p>
          <p align="center">Time : <?php echo date("H:i",time()); ?></p>
          <p align="center"><a href="new_form.php">Add</a> | <a href="list.php">List</a></p>
      </td>
    </tr>
  </table>
</div>
 
</body>
</html>