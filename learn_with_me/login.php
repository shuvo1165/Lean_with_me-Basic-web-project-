<?php 
session_start();
include "header.html";
include 'database.php';
$message = [];
$conn = OpenCon();
if (isset($_SESSION['login'])) {
	header('location: view.php');
	}
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];


	if (empty($username) || empty($password)) {
		array_push($message, '<p style="color: red; font-size: 15px;">Username or password must not be empty');
	}else{
		$query = "select * from admin where username ='$username' and password = '$password'";
            $status = $conn ->query($query) or die($conn ->error);
            if ($status->num_rows > 0) {
                $data = $status->fetch_assoc();
                //Session::init();
                $_SESSION['login'] =  true;
                $_SESSION['username'] =   $data['username'];
                $_SESSION['name'] =   $data['name'];
                header("Location: view.php");
            } else {
                
               array_push($message, '<p style="color: green; font-size: 15px;">Username or password not matched');
        }
	}

}
?>


<div id=frm>
<form action="login.php" method="POST">
	<label>Username</label>
	<input type="text" name="username" placeholder="Username" ><br><br>
	<label>Password</label>
	<input type="text" name="password" placeholder="Password"><br><br>
	<input type="submit" name="submit" value="submit">
</form>
</div>
<?php include 'footer.html';?>