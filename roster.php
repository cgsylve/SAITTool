<?php
	function addPerson($incident, $summary, $name, $type, $email){
		$username = "root";
	    $password = "root";
	    $hostname = "localhost"; 

	        //connection to the database
	    $conn = mysql_connect($hostname, $username, $password) 
	    	or die("Unable to connect to MySQL");

	    $sql = "INSERT INTO assignments VALUES ('$incident', '$summary', '$name', '$type', '$email')";

	    mysql_select_db("saitdb");

	    $retval = mysql_query($sql, $conn)
	    	or die ("Failed");

	   	echo ("Success");
	   	mysql_close($conn);
		
	}

	if($_POST['action'] == "createAssignment"){	
			$incident = $_POST['incident'];
			$summary = $_POST['summary'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$type = $_POST['type'];

			addPerson($incident, $summary, $name, $type, $email);						
		}
?>