<?php
	session_start();

		function logout($fname){
		$username = "calebsyl_admin";
	    $password = "rootpass";
	    $hostname = "localhost"; 

	        //connection to the database
	    $conn = mysql_connect($hostname, $username, $password) 
	    	or die("Unable to connect to MySQL");

	    $sql = "DELETE FROM loggedin 
	    		WHERE fname='$fname'";

		mysql_select_db("calebsyl_saitdb");

		$retval = mysql_query($sql, $conn)
			or die ("Failed to add to loggedin");

		return "Logged out";
	}

	//if(isset($_POST['#logoutLink'])){
		$fname = $_SESSION['fname'];
		$msg = logout($fname);
		

		// remove all session variables
		session_unset(); 

		// destroy the session 
		session_destroy(); 
		
	//}
?>

<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<style type="text/css">

		html, body{
		height: 100%; 
		width: 100%; 
		background-color: #1e7b1e;
		text-align: center;
	}

	.jumbotron {
	color: white !important;
	background-color: transparent !important;
}

	</style>
</head>
<body>

	<div class="jumbotron">
				<h1>You have been logged out</h1>
				<p>Thank you for using the tool</p>
			</div>
		</div>

</body>
</html>