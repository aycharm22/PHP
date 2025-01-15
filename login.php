<?php
	session_start();
 	include "crud/database.php";

	 if (isset($_POST['login'])) 
	 {
	 		$username = $_POST['username'];
	 		$useremail = $_POST['useremail'];
	 		$userpassword = $_POST['userpassword'];

	 	$username = mysqli_real_escape_string($connect,$username);
	 	$userpassword = mysqli_real_escape_string($connect,$userpassword);
	 	$useremail = mysqli_real_escape_string($connect,$useremail);

	 	$query = "SELECT * FROM `form` WHERE useremail='$useremail'";
	 	$result=mysqli_query($connect,$query);
	 	while ($row=mysqli_fetch_assoc($result)) {
	 		$db_id = $row['id'];
	 		$db_username = $row['username'];
	 		$db_userpassword = $row['userpassword'];
	 		$db_useremail = $row['useremail'];
	 	}
	 	if ($useremail == $db_useremail) {
	 		if ($userpassword == $db_userpassword) {
	 			if ($username==$db_username) {
	 				$_SESSION['username'] = $db_username;
		 			$_SESSION['userpassword'] = $db_userpassword;
		 			$_SESSION['useremail'] = $db_useremail;
		 			header('location:select.php');
	 			}
	 			else{
	 				echo "Incorrect Your Name";
	 			}
	 			
	 		}else{
	 			echo "Incorrect Password";
	 		}
	 	}else{
	 		echo "Incorrect Email";
	 	}
	 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="assets/library/bootstrap-4.3.1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">;
</head>
<body>
	<div class="container" style="width: 300px">
		<h3>Login Form</h3>
		<form action="" method="post">
			<input type="text" name="username" required="" placeholder="UserName" class="form-control"><br>
			<input type="email" name="useremail" required="" placeholder="UserEmail" class="form-control"><br>
			<input type="password" name="userpassword" required="" placeholder="UserPassword" class="form-control"><br>
			<input type="submit" name="login" value="Login"  class="btn btn-primary">
		</form>
	</div>
<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<!-- <script src="assets/js/popper.min.js"></script> -->
</body>
</html>