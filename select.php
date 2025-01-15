<?php 
	session_start();
	ob_start(); 
?>
<?php 
	if (!isset($_SESSION['useremail'])) {
		header('location:login.php');
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Table Document</title>
	<link rel="stylesheet" href="assets/library/bootstrap-4.3.1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<div class="container">
		<p class="navbar-text navbar-right float-right"><a href="logout.php" class="navbar-link btn btn-info">Logout</a></p>
		<h3 class="text-center">Select Table</h3>
		<a href="insertform.php" class="btn btn-primary">Insert Form</a>

		<table class="table table-bordered table-hover width-100%">
			<tr>
				<th>No:</th>
				<th>UserName</th>
				<th>UserEmail</th>
				<th>UserPassword</th>
				<th>Update</th>
				<th>Delete</th>
			</tr>
			<?php
				$no=1;
				include "crud/database.php";
				$query = "SELECT * FROM `form`";
				$result = mysqli_query($connect,$query);
				while ($row= mysqli_fetch_assoc($result)) {
				
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $row['username'] ?></td>
				<td><?php echo $row['useremail'] ?></td>
				<td><?php echo $row['userpassword'] ?></td>
				<td><a href="update.php?edit=<?php echo $row['id'] ?>" class="btn btn-warning">Update</a></td>
				<td><a href="select.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
			</tr>
		<?php } ?>
		</table>
	</div>
<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

<?php
if (isset($_GET['delete'])){
	$delete_id = $_GET['delete'];
	$query = "DELETE FROM `form` WHERE id=$delete_id";
	mysqli_query($connect,$query);
	header('location:select.php');
	}
?>