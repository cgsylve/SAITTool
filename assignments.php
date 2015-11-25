<?php
	session_start();
	function createAssignment($incident, $summary, $name, $type, $email){
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

	function deleteAssignment($checked){
		$username = "root";
	    $password = "root";
	    $hostname = "localhost"; 
	    $delString = "";

	        //connection to the database
	    $conn = mysql_connect($hostname, $username, $password) 
	    	or die("Unable to connect to MySQL");

	   	for ($i = 0; $i < count($checked); $i++){
	   		if ($i != count($checked) - 1){
	   			$delString = $delString."'".$checked[$i]."', ";
	   		}
	   		else{
	   			$delString = $delString."'".$checked[$i]."'";
	   		}	
	   	}

	    $sql = "DELETE FROM assignments WHERE incident IN ($delString)";

	    mysql_select_db("saitdb");

	    $retval = mysql_query($sql, $conn);

		echo "Deleted";

		mysql_close($conn);

	}

	if($_POST['action'] == "createAssignment"){	
			$incident = $_POST['incident'];
			$summary = $_POST['summary'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$type = $_POST['type'];

			createAssignment($incident, $summary, $name, $type, $email);						
		}

	else if ($_POST['action'] == 'delete'){
		$checked = $_POST['list'];

		deleteAssignment($checked); 
	}
?>