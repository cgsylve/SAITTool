<?php
	$username = "root";
    $password = "root";
    $hostname = "localhost"; 

        //connection to the database
    $conn = mysql_connect($hostname, $username, $password) 
    	or die("Unable to connect to MySQL");
       
    echo 'Connected to DB from external<br>';

    $query = "SELECT * FROM login";
	echo($query);
	echo("<br>");

	mysql_select_db("saitdb");
	$retval = mysql_query($query, $conn);
	if(!$retval){
		die("Could not execute query" + mysql_error());
	}

	while($row = mysql_fetch_assoc($retval)){
		echo "First Name: {$row['fname']} <br>";
	}
	mysql_close($conn);
?>
