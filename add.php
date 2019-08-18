<?php

$con = mysqli_connect("localhost","root","","inventorymanager");

if($con)
	echo "Connected";
else
	echo "Error : ".mysqli_error($con);

$query = "insert into inventory (Inv_item_name,current_stock,cost_per_unit) values('".$_POST["name"]."','".$_POST["stock"]."','".$_POST["rate"]."') ";

if($result = mysqli_query($con,$query)){
	header("Location: index.php");
	exit;
}

?>