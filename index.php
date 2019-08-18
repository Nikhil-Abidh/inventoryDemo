<?php

$con = mysqli_connect("localhost","root","","inventorymanager");

if($con)
	echo "Connected";
else
	echo "Error : ".mysqli_error($con);

$query = "select * from Inventory";
$result = mysqli_query($con,$query);

$query2 = "select * from recipe";
$result2 = mysqli_query($con,$query2);

?>

<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

	<title>Inventory Management</title>
		<style type="text/css">
		#popup-main{
			position: fixed;
			height: 100%;
			width: 100%;
			z-index: 1000;
		}
		#popup-info{
			width: 400px;
			height: 270px;
			position: absolute;
			top: 20%;
			transform: translate(-20%,-50%);
			box-shadow:1px 2px 5px 3px green;
			left: 30%;
			background:white;
		}
		form{
			text-align: center;
			color: green;
		}
	</style>
</head>
<body>
	<h4>Hello Guys</h4>
<table border="solid black 2px">
	<tr>
		<th>Inventory ID</th>
		<th>Inventory Name</th>
		<th>Current Stock</th>
		<th>Cost per unit</th>
		<th>Net Cost</th>
		<th>Action</th>
	</tr>
	<?php
	while ($row = mysqli_fetch_assoc($result) ) { 
	?>
	<tr>
		<td><?php echo $row['inv_id'] ?></td>
		<td><?php echo $row["Inv_item_name"] ?> </td>
		<td><?php echo $row["current_stock"] ?> </td>
		<td><?php echo $row["cost_per_unit"] ?> </td>
		<td><?php echo $row["current_stock"]*$row["cost_per_unit"] ?></td>
		<td><a href="update.php?edit=<?php echo $row['inv_id']; ?> " >Buy</a></td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="5"></td>
		<td><button id="popupbtn">Add</button></td>
	</tr>
</table>
<br><br><br><br>
<table border="solid black 2px">
	<tr>
		<th>Menu</th>
		<th>Menu ID</th>
		<th>Inventory Item</th>
		<th>Quantity</th>
		<th>Price</th>
		<th colspan="2">Action</th>
	</tr>
	<?php
	while ($row2 = mysqli_fetch_assoc($result2) ) { 
	?>
	<tr>
		<td><?php echo $row2['rec_name'] ?></td>
		<td><?php echo $row2["rec_id"] ?> </td>
		<td><?php echo $row2["inv_item_name"] ?> </td>
		<td><?php echo $row2["inv_item_amount"] ?> </td>
		<td><?php echo $row2["price"] ?></td>
		<td><a href="sell.php?id=<?php echo $row2["rec_id"] ?> " >Sell</a></td>
		<td><a href="editrec.php?id=<?php echo $row2["rec_id"] ?>" >Edit </a></td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="5"></td>
		<td><button id="popupbtn2">Add</button></td>
	</tr>
</table>


<div id="popup-main" style="display: none">
	<div id="popup-info">
		<h2>Add new Inventory</h2>
		<form action="add.php" method="Post">
			<label>Inventory Name :</label>
			<input type="text" name="name" ></br></br>
			<label>Current Stock :</label>
			<input type="text" name="stock" ></br></br>
			<label>Price :</label>
			<input type="text" name="rate" ></br></br>
			<button>Add</button>
			<button id="cancelbtn">Cancel</button>
		</form>
	</div>
</div>

<script type="text/javascript">

$(document).ready(function(){
	$('#popupbtn').click(function(){
		$('#popup-main').css("display","block");
	});

	$('#cancelbtn').click(function(){
		$('#popup-main').css("display","none");
	});
});

</script>

</body>
</html>