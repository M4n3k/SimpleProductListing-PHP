<?php

include ('assets/config.php'); //including config file which has database connection

$dlt = $_REQUEST['id'];


$dltsql = "DELETE FROM product WHERE ID = $dlt";

$finaldltsql = mysqli_query($conn,$dltsql);

if($finaldltsql == TRUE){
	echo "Data Delete";
	header("Location: dashboard.php?deleted"); //If the Delete query runs successfuly it'll redirect to the view.php page
}else{
	echo "Data Not Delete";
}

?>