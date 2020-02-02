<?php
	require_once('functions/admin-functions.php');
	$id = $_REQUEST['deleteId'];
	$query = "DELETE FROM tbl_user WHERE id='$id' ";
	$sqlQuery = mysqli_query($dbconnect,$query);
	header('Location:all-user.php');
?>