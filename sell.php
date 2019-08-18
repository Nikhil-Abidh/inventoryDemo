<?php

$con = mysqli_connect("localhost","root","","inventorymanager");

if($con)
	echo "Connected"."<br>";
else
	echo "Error : ".mysqli_error($con);

$rid = $_GET["id"];
echo $rid."<br>";

$query = "select * from Inventory";

$query2 = "select * from recipe where rec_id='".$rid."' ";

$fstock = 0;
$x = 0;
$query3 = '';

$result2 = mysqli_query($con,$query2);
while ($row2 = mysqli_fetch_assoc($result2))
{	
	$result = mysqli_query($con,$query);	
	while ($row = mysqli_fetch_assoc($result))
	{
		if( $row2["inv_item_name"] == $row["Inv_item_name"])
		{
			$cstock = $row["current_stock"];
			$ustock = $row2["inv_item_amount"];
			$fstock = $cstock-$ustock;
			$x = $row["inv_id"];

			$query3 .= " update Inventory set current_stock='".$fstock."' where inv_id='".$x."'; ";	
		}		

	}
	mysqli_free_result($result);
}


if($result3 = mysqli_multi_query($con,$query3)){
	header("Location: index.php");
	exit;
}	

?>