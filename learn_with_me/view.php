<?php
session_start();
include 'database.php';
$conn = OpenCon();
if (!isset($_SESSION['login'])) {
	header('location: login.php');
}
$message = [];

?>

<html>
<head>
	<title> Log-in</title>
	<h2 class="h" align="center">Welcome to Log-in </h2>
	<link rel="stylesheet" type="text/css" href="learn_admin.css">
</head>

<body id="b">
	<div id="d">

		<form action="#" method="POST" >
			<h2>Welcome <?php echo $_SESSION['username']; ?></h2>
			<a href="logout.php">logout</a>
			<a href="student.php">Student List</a>
			
		</form>

	</div>

</body>
</html>