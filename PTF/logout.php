<?php 
session_start();
//unset($_SESSION['noId']);
session_destroy();
?>

<script>
{
alert("You've successfully logout from the system.");
self.location.href='index.php';
}
</script>
<input type="button" onClick="show_alert()" value="OK" />