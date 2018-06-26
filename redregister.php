<?php
	$htno = $_POST['htno'];
	$name = $_POST['name'];
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
	

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT htno FROM user where htno=$htno";
$result=mysqli_query($conn,$sql);  
$rowcount=mysqli_num_rows($result);
  if ($rowcount>0) {
  		echo "<script>alert(\"HTNumber Already Exits\")</script>";
		header("refresh:0;url=index.html");
  }
  else {
  		$sql = "INSERT INTO user (HTNO, PASSWORD ,NAME , MOBILE , EMAIL , BRANCH , YEAR , AGGREGATE , TECHSKILLS , PROSKILLS , ABOUT )
	                 VALUES ('$htno' ,'$pass', '$name' , '$mobile' , '$email' , '$branch' , '$year' , '$aggregate' ,'$techarray' ,'$proarray' , '$about')";
		
		//	$sql = "INSERT INTO redants.user (HTNO) VALUES ('14k61a0576')";

		if (mysqli_query($conn, $sql)) {
			
		    echo "<script>alert(\"CREATED SUCCESFULLY\")</script>";
			header("refresh:0;url=index.html");
			
		} else {
		    echo "<script>alert(\"HTNumber Already Exits\")</script>";
		header("refresh:0;url=index.html");
		}

		mysqli_close($conn);
		}
?>