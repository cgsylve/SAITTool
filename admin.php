<?php
session_start();

	function approveUser($email){
		$username = "calebsyl_admin";
	    $password = "rootpass";
	    $hostname = "localhost"; 

	        //connection to the database
	    $conn = mysql_connect($hostname, $username, $password) 
	    	or die("Unable to connect to MySQL");

	    $sql = "UPDATE login 
	    		SET approved = 'y'
	    		WHERE email='$email'";

		mysql_select_db("calebsyl_saitdb");

		$retval = mysql_query($sql, $conn)
			or die("Failed");

		echo "Made it";
	}

	if($_POST["action"] == "approve"){
		$email = $_POST["email"];
		approveUser($email);
	}

?>