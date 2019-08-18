<?php

$con = mysqli_connect("localhost","root","","inventorymanager");

if($con)
	echo "Connected";
else
	echo "Error : ".mysqli_error($con);

$id = $_GET["edit"];
$query = "select * from Inventory where inv_id='".$id."' ";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);

$count = $row["current_stock"]+1;

$query2 = "update Inventory set current_stock='".$count."' where inv_id='".$id."'  ";

if($result2 = mysqli_query($con,$query2)){
	echo $row["Inv_item_name"]." is added";
	header("Location: index.php");
	exit;
}

?>