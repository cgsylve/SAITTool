<?php

	session_start();

	

	function getCurrent(){
		$username = "calebsyl_admin";
	    $password = "rootpass";
	    $hostname = "localhost"; 

	        //connection to the database
	    $conn = mysql_connect($hostname, $username, $password) 
	    	or die("Unable to connect to MySQL");

	    $sql = "SELECT * FROM loggedin";

	    mysql_select_db("calebsyl_saitdb");
            			
       	$retval = mysql_query($sql, $conn);

	   	while($row = mysql_fetch_row($retval)){
	   		echo '<li><a href = "#">'.$row[0].'</a></li>';
	   }
               			
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

	else if($_POST['action'] == "getCurrent"){
		getCurrent();
	}
	
?>