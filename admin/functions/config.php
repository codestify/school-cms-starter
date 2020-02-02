<?php
	$dbHost ='db';
	$dbUsername ='root';
	$dbPassword ='docker';
	$dbname ='school';
	$dbconnect = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbname);
	if(!$dbconnect){
		//echo "Database Connection Error!!!";
		die("Failed to connect to MySQL".mysqli_connect_error($dbconnect));
	}
	$dbconnect->set_charset("utf8"); //for bangla
