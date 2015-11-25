<?php

session_start();

	function createToner($name, $usedIn, $color, $count, $needs){
		$username = "root";
	    $password = "root";
	    $hostname = "localhost"; 

	        //connection to the database
	    $conn = mysql_connect($hostname, $username, $password) 
	    	or die("Unable to connect to MySQL");

	    $sql = "INSERT INTO toner VALUES ('$name', '$usedIn', '$color', '$count', '$needs')";

	    mysql_select_db("saitdb");

	    $retval = mysql_query($sql, $conn)
	    	or die ("Failed");

	   	echo ("Success");
	   	mysql_close($conn);
		
	}

	function deleteToner($checked){
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

	    $sql = "DELETE FROM toner WHERE name IN ($delString)";

	    mysql_select_db("saitdb");

	    $retval = mysql_query($sql, $conn);

		echo "Deleted";

		mysql_close($conn);

	}

	function updateToner($name, $usedIn, $color, $count, $needs){

		$username = "root";
	    $password = "root";
	    $hostname = "localhost"; 

	        //connection to the database
	    $conn = mysql_connect($hostname, $username, $password) 
	    	or die("Unable to connect to MySQL");

	    $sql = "UPDATE toner SET used_in = '$usedIn', color = '$color', count = '$count', needs_ordered = '$needs' WHERE name = '$name'";

	    mysql_select_db("saitdb");

	    $retval = mysql_query($sql);

	    echo ("Success");

	    mysql_close($conn);
	}

	if($_POST['action'] == "createToner"){	
			$name = $_POST['name'];
			$usedIn = $_POST['usedIn'];
			$color = $_POST['color'];
			$count = $_POST['count'];
			$needs = $_POST['needs'];

			createToner($name, $usedIn, $color, $count, $needs);						
		}

	else if ($_POST['action'] == 'delete'){
		$checked = $_POST['list'];

		deleteToner($checked); 
	}

	else if ($_POST['action'] == 'updateToner'){
		$name = $_POST['name'];
		$usedIn = $_POST['usedIn'];
		$color = $_POST['color'];
		$count = $_POST['count'];
		$needs = $_POST['needs'];

		updateToner($name, $usedIn, $color, $count, $needs);
	}
?>