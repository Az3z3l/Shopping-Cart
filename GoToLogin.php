<?php

session_start();

$server = "localhost";
$user="root";
$pass="";
$dbname="Cart";

$conn=new mysqli($server, $user, $pass, $dbname);

if($conn->connect_error){
        echo "failed connection";
        die("connection failed:" . $conn->connect_error);
        }
?>

<!DOCTYPE HTML>

<TITLE> CHECKOUT PAGE </TITLE>

<STYLE>
.checkout{
	background-color:grey;	
	color:black;
	margin:20px;
	padding:20px;
	text-align: right;
	}
	
.item{
  	background-color: black;
  		color: white;
  		margin: 20px;
		padding: 20px;
		text-align: center;
}
.name{
	background-color:red;
	color:black;
	margin:20px;
	padding:10px;
}
}
</STYLE>

<BODY>

<div class="name">
	<center><H2>Checkout Your Cart</h2></center>
</div>

<TABLE width=100%>
	<THEAD>
		<TR>
			<TH SCOPE="COL">ID</TH>
			<TH SCOPE="COL">PRODUCT</TH>
			<TH SCOPE="COL">QUANTITY</TH>
			<TH SCOPE="COL">COST</TH>
		</TR>
	</THEAD>
	<TBODY>
        <?php
                        $query = "SELECT * FROM Cart.Shopping";
                        $result = mysqli_query($conn, $query);
			$i=1;
			$_SESSION['x']=0;
                        while($row = mysqli_fetch_array($result)){
                                echo "<tr class=\"item\">";
                                if($_SESSION['une']>0 && $row['ID']==1){
                                echo "<td>" . $row['ID'] . "<td>".$row['Product']."</td><td>".$_SESSION['une']."</td><td>".$_SESSION['une']*2001 ."</td>" ;
                                $_SESSION['x']=$_SESSION['x']+($_SESSION['une']*2001);
                                }
                                if($_SESSION['doix']>0 && $row['ID']==2){
                                echo "<td>" . $row['ID'] . "<td>".$row['Product']."</td><td>".$_SESSION['doix']."</td><td>".$_SESSION['doix']*54999 ."</td>";
                                $_SESSION['x']=$_SESSION['x']+($_SESSION['doix']*54999);
                                }
                                if($_SESSION['trois']>0 && $row['ID']==3){
                                echo "<td>" . $row['ID'] . "<td>".$row['Product']."</td><td>".$_SESSION['trois']."</td><td>".$_SESSION['trois']*7499 ."</td>";
                                $_SESSION['x']=$_SESSION['x']+($_SESSION['trois']*7499);
                                }
                                if($_SESSION['quatre']>0 && $row['ID']==4){
                                echo "<td>" . $row['ID'] . "<td>".$row['Product']."</td><td>".$_SESSION['quatre']."</td><td>".$_SESSION['quatre']*14000 ."</td>";
                                $_SESSION['x']=$_SESSION['x']+($_SESSION['quatre']*14000);
                                }
                                echo "</tr>";     
				$i=$i+1;
				}
?>
</table>
<form name="HOME" method="post"> 
<div class="checkout">
	CheckOut <input type="submit"  name="chkout" value="SEND THOSE ITEMS HOME">
	<br>
	</div>
	</form>
	<?php
	        echo "<strong>Total cost.....Rs.". $_SESSION['x'] . "</strong>";
		if(isset($_POST['chkout'])){
				
				
				header("location:GoToLogin2.php");
				exit();
	}
	?>
</div>          

</body>
</html>
