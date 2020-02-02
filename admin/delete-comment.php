<?php
	require_once('functions/admin-functions.php');
	$id = $_REQUEST['delete_id'];
	$query = "DELETE FROM `comments` WHERE comment_id='$id' ";
	$sqlQuery = mysqli_query($dbconnect, $query);
	header('Location: all-comments.php');
?>