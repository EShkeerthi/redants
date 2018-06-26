<?php
	//Sample Database Connection Syntax for PHP and MySQL.
	
	//Connect To Database
	
	$hostname="166.62.28.115";
	$username="redants";
	$password="Sasi@123";
	$dbname="redants";
	$usertable="user";
	$yourfield = "HTNO";
	
	mysql_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
	mysql_select_db($dbname);
	
	# Check If Record Exists
	
	$query = "SELECT * FROM $usertable";
	
	$result = mysql_query($query);
	
	if($result){
		while($row = mysql_fetch_array($result)){
			$name = $row["$yourfield"];
			echo "Name: ".$name."<br/>";
		}
	}
?>