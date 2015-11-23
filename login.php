<?php
session_start();

	function addToCurrent($fname, $lname, $email){

		$username = "root";
	    $password = "root";
	    $hostname = "localhost"; 

	        //connection to the database
	    $conn = mysql_connect($hostname, $username, $password) 
	    	or die("Unable to connect to MySQL");


		$_SESSION['fname']=$fname; 
		$_SESSION['lname']=$lname; 
		$_SESSION['email']=$email;
		return $_SESSION['fname'];
	}

	function login($email, $pass){

		$username = "root";
	    $password = "root";
	    $hostname = "localhost"; 

	        //connection to the database
	    $conn = mysql_connect($hostname, $username, $password) 
	    	or die("Unable to connect to MySQL");
	       
	    
		$sql = "SELECT email, pass, approved, fname, lname
				  FROM login
		 		  WHERE email = '$email'
		 		  AND pass = '$pass'";
		

		mysql_select_db("saitdb");

		$retval = mysql_query($sql, $conn)
			or die("Failed");

		if(mysql_num_rows($retval)){
			while($row = mysql_fetch_assoc($retval)){

				$user = $row['email'];
				$pass = $row['pass'];
				$approved = $row['approved'];
				$fname = $row['fname'];
				$lname = $row['lname'];

				

				if($approved == "n"){
					echo ("not approved");

				}// end if

				else{
					$msg = addToCurrent($fname, $lname, $email);
					echo ($msg." logged in");
				} //end else

				} // end while
		} // end if			

		else{
			echo ("wrong");
		}// end else		
		mysql_close($conn);	
	} //end login()

	function createUser($fname, $lname, $email, $pass){

		$username = "root";
	    $password = "root";
	    $hostname = "localhost"; 

	    //connection to the database
	    $conn = mysql_connect($hostname, $username, $password) 
	    	or die("Unable to connect to MySQL");
	       
	       
	    //echo 'Connected to DB from external<br>';

		//$sql = "INSERT INTO login VALUES ('".$fname."', '".$lname."', '".$email."', '".$pass."')";
		$sql = "INSERT INTO login VALUES ('$fname', '$lname', '$email', '$pass', 'n')";
		//echo($sql."<br>");
		mysql_select_db("saitdb");

		$retval = mysql_query($sql, $conn)
			or die("Failed");

		

		echo ("Success");
		mysql_close($conn);
		

		}

		if($_POST['action'] == "login"){	
			$email = $_POST['email'];
			$pass = $_POST['pass'];		
			login($email, $pass);

							
		}
		else if ($_POST['action'] == "create"){
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$pass = $_POST['pass'];

			createUser($fname, $lname, $email, $pass);
		}
				
?>