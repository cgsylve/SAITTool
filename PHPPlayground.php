<?php
	 $username = "root";
        $password = "root";
        $hostname = "localhost"; 

        //connection to the database
        $link = mysql_connect($hostname, $username, $password) 
          or die("Unable to connect to MySQL");
       
        echo 'Connected to DB from external';
?>
