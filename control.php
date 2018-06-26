<?php
	session_start();
	include_once("DBConnect.php");
	$htno = $_POST['htno'];
	$name = $_POST['uname'];
	$pass = $_POST['password'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$branch = $_POST['branch'];
	$year = $_POST['year'];
	$aggregate = $_POST['aggregate'];
	$techskills = $_POST['techskills'];
	$proskills = $_POST['proskills'];
	$about = $_POST['about'];


	$techarray = implode(",", $techskills);
	$proarray = implode(",", $proskills);
	$servername = "localhost";
	$username ="redants";
	$password = "Sasi@123";
	$dbname = "redants";

	$dbc = new DBConnect();
	$dbc->connect();
	$sql = "INSERT INTO user (HTNO, PASSWORD ,NAME , MOBILE , EMAIL , BRANCH , YEAR , AGGREGATE , TECHSKILLS , PROSKILLS , ABOUT )
	                 VALUES ('$htno' ,'$pass', '$name' , '$mobile' , '$email' , '$branch' , '$year' , '$aggregate' ,'$techarray' ,'$proarray' , '$about')";
	$data = $dbc->insert($sql);
	if ($data) {
			
		    echo "<script>alert(\"CREATED SUCCESFULLY\")</script>";
			header("refresh:0;url=index.html");
			
		} else {
		    echo "<script>alert(\"HTNumber Already Exits\")</script>";
		header("refresh:0;url=index.html");
		}

		mysqli_close($conn);
		
	
?>
