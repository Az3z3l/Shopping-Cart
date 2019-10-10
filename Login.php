

<!DOCTYPE html>
<html>
<head>
<title>TRY SQL</title>
</head>
<form name="SQL injection t.r.y" method="POST">
<br>user<input type="text" name="user">
  <br>password<input type="password" name="pass">
  <br>
  <input type="submit"  name="button1" value="login">
  </form>
<?php
if(isset($_POST['button1'])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bi0s";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	echo "failed connection";
    die("Connection failed: " . $conn->connect_error);
} 
$username = $_POST["user"];
$password = $_POST["pass"];

$query="SELECT no FROM bi00s WHERE user='$username' AND pass='$password' ";

//$result = mysqli_query( $conn, $query);
	$result = $conn->query($sql);
$check = mysqli_fetch_array($result);

if(!$check){
	$message = "wrong user id or password";
	echo $message."<br>";
	echo $username."<br>" ;
	echo $password ."<br>";
}
else{
	$message = "Authentication Success";
	echo "<center>".$message."</center><br>";
	echo $username. "<br>";
	echo $password ."<br>";
	header("location:ShoppingCart2.php");
	exit();
}
}
?>
 </html>
