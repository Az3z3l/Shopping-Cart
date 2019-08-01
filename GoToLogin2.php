<?php
session_start();
?>

<!doctype Html>
<title>End Page</title>
<body>
<?php
if($_SESSION['x']>0){
$message = "Order Successfully Placed";
echo "<script type='text/javascript'>alert('$message')</script>";
}
else{
$message=" No order was placed";
echo "<script type='text/javascript'>alert('$message')</script>";
}
?>
<form name="GoBack"  method="POST" >
<center><input type="submit" name="return" value="Return to Login Page"></center>
<?php
if(isset($_POST['return'])){
	header("location:Login.php");
	exit();
}
?>

</form>
</body>
</html>
