<?php  
  
require_once 'db.php';
session_start();

if(isset($_POST['btn_login']))
{
		try{
			$stmt=$conn->prepare("SELECT fld_staff_id, fld_staff_pass, fld_staff_role FROM tbl_staffs_a175275 WHERE fld_staff_id = :uid AND fld_staff_pass = :upass AND fld_staff_role = :urole");

			$stmt->bindParam(':uid',$id,PDO::PARAM_STR);
			$stmt->bindParam(':upass',$pass,PDO::PARAM_STR);
			$stmt->bindParam(':urole',$role,PDO::PARAM_STR);

			$id = $_POST['id'];
			$pass =$_POST['pass'];
			$role = $_POST['role'];
			$stmt->execute();
			$result = $stmt->fetchAll();
		
		if(!empty($_POST['id']) AND !empty($_POST['pass']) AND !empty($_POST['role'])){
			if($stmt->rowCount()>0)
			{
				if($id==$_POST['id'] AND $pass==$_POST['pass'] AND $role==$_POST['role'])
				{
					switch($_POST['role'])
					{
						case "admin":
						$_SESSION["admin_login"]=$id;
						$loginMsg="Successfully Login!";
						header("refresh:1;adminhome.php");
						break;

						case "supervisor":
						$_SESSION["sv_login"]=$id;
						$loginMsg="Successfully Login!";
						header("refresh:1;svhome.php");
						break;

						case "staff":
						$_SESSION["staff_login"]=$id;
						$loginMsg="Successfully Login!";
						header("refresh:1;staffhome.php");
						break;

						default:
						echo ("<script type =\"text/javascript\">");
		 echo ("alert('The username and password you entered did not match our records. Please double-check and try again.');");
 		 echo ("window.location=\"index.php\"");
 		 echo ("</script>");
					}
				}
				else{
					echo ("<script type =\"text/javascript\">");
		 echo ("alert('The username and password you entered did not match our records. Please double-check and try again.');");
 		 echo ("window.location=\"index.php\"");
 		 echo ("</script>");
				}
			}
			else{
					echo ("<script type =\"text/javascript\">");
		 echo ("alert('The username and password you entered did not match our records. Please double-check and try again.');");
 		 echo ("window.location=\"index.php\"");
 		 echo ("</script>");
			}
	}
}
catch(PDOException $e)
	{
		$e->getMessage();
	}
}
?>