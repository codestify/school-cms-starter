<?php
	require_once('functions/admin-functions.php');
	$id = $_REQUEST['slide_id'];
	$query = "DELETE FROM sliders WHERE slide_id='$id' ";
	$sqlQuery = mysqli_query($dbconnect, $query);
	header('Location: all-sliders.php');
?>