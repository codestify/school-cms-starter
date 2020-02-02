<?php
	require_once('functions/admin-functions.php');
	$id = $_REQUEST['announce_id'];
	$query = "DELETE FROM news WHERE news_id='$id' ";
	$sqlQuery = mysqli_query($dbconnect, $query);
	header('Location: announcements.php');
?>