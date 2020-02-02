<?php
	require_once('functions/admin-functions.php');
	$id = $_REQUEST['enews_id'];
	$query = "DELETE FROM news WHERE news_id='$id' ";
	$sqlQuery = mysqli_query($dbconnect, $query);
	header('Location:latest-news.php');
?>