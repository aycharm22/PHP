<?php
	ob_start();
	include "crud/database.php";
	if(isset($_POST['register']))
	{
	    $username = $_POST['username'];
	    $useremail = $_POST['useremail'];
	    $userpassword = $_POST['userpassword'];
	    $query = "INSERT INTO `form`(`username`, `useremail`, `userpassword`) VALUES ('$username','$useremail','$userpassword')";
	    mysqli_query($connect,$query);
	    header('location:select.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Insert</title>
	<link rel="stylesheet" href="assets/library/bootstrap-4.3.1-dist/css/bootstrap.min.css">
</head>
<body>
	<h3 class="text-center">Insert Form</h3>
	<form action="addform.php" method="post">
		<input type="text" name="username" required="" placeholder="UserName" class="form-control"><br>
		<input type="email" name="useremail" required="" placeholder="UserEmail" class="form-control"><br>
		<input type="password" name="userpassword" required="" placeholder="UserPassword" class="form-control"><br>
		<input type="submit" name="register" class="btn btn-primary">
	</form>

<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<!-- <script src="assets/js/popper.min.js"></script> -->
</body>
</html>