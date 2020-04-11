<?php
session_start();
include 'database.php';
$conn = OpenCon();
if (!isset($_SESSION['login'])) {
	header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Database Show</title>
<link rel="stylesheet" type="text/css" href="learn_admin.css">
</head>
<body>
<table>
<tr>
<th>Name</th>
<th>Email</th>
<th>Course Code</th>
</tr>
<?php
$sql = "SELECT Last_name, Email, Course_code FROM admission";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["Last_name"]. "</td><td>" . $row["Email"] . "</td><td>"
. $row["Course_code"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }

?>
</table>
<p><a href="logout.php">Logout</a></p>
	
</body>
</html>