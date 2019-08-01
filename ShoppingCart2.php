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
        $_SESSION['une']=0;
	$_SESSION["doix"]=0;
	$_SESSION["trois"]=0;
	$_SESSION["quatre"]=0;
?>



<!DOCTYPE HTML>

<TITLE>The Shopping Cart</TITLE>

<STYLE>
.name{
	background-color:red;
	color:black;
	margin:20px;
	padding:10px;
}

.item{
  	background-color: black;
  		color: white;
  		margin: 20px;
		padding: 20px;
}

.checkout{
                background-color:grey;
  		color: black;
  		margin: 20px;
		padding: 20px;
                text-align:right;
}

</STYLE>

<BODY>
 
<div class="name">
	<center><H2>The Shopping Cart</H2></center>
	<center><p>The only cart you'll ever need</p></center>
</div>




<form name="calculation" method="post">

 <table  width=100%>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>    
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Description</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query = "SELECT * FROM Cart.Shopping";
                        $result = mysqli_query($conn, $query);
			$i=0;
                        while($row = mysqli_fetch_array($result)){
                                echo "<tr class=\"item\">
                                <td>" . $row['ID'] . "</td>
                                <td><img src=\"".$row['Image']."\" height=60 width=60 </td><td>".$row['Product']."</td>
                                <td>".$row['Description']."</td>";
                              	if($row['ID']==1){echo "<td> <input name=\"one\" type=\"text\"  value=\"1\"> </td>";}
                              	else if ($row['ID']==2){echo "<td> <input name=\"two\" type=\"text\"  value=\"1\"> </td>";}
                             	else if ($row['ID']==3){echo "<td> <input name=\"three\" type=\"text\"  value=\"1\"> </td>";}
                              	else if ($row['ID']==4){echo "<td> <input name=\"four\" type=\"text\"  value=\"1\"> </td>";}
                                echo "<td>".$row['Price']."</td>
                                </tr>";
}
?>

        
			</table>

<div class="checkout">
	CheckOut <input type="submit"  name="chkout" value="I'm Done.!">
	<br>
	</div>
	</form>
	<?php
		if(isset($_POST['chkout'])){
				
				$_SESSION["une"]=$_POST['one'];
				$_SESSION["doix"]=$_POST['two'];
				$_SESSION["trois"]=$_POST['three'];
				$_SESSION["quatre"]=$_POST['four'];
				echo $_SESSION['une'];
				echo $_SESSION['doix'];
				echo $_SESSION['trois'];
				echo $_SESSION['quatre'];
				header("location:GoToLogin.php");
				exit();
	}
	?>
	
</BODY>
</HTML>
