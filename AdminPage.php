<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
</head>
<body>
	<div id="daily-reservations" class="tab-pane fade in active">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>	
								<th>Approve</th>							
							</tr>
						</thead>
						<tbody id="tonerBody">
					
						<?php

								session_start();
								$username = "calebsyl_admin";
							    $password = "rootpass";
							    $hostname = "localhost"; 

							        //connection to the database
							    $conn = mysql_connect($hostname, $username, $password) 
							    	or die("Unable to connect to MySQL");

							    mysql_select_db("calebsyl_saitdb");
							    $sql = "SELECT fname, lname, email FROM login WHERE approved = 'n'";

								$retval = mysql_query($sql, $conn);
								while($row = mysql_fetch_row($retval)){
									
								 	
								 	echo "<tr id = '".$row[2]."-row'>";							 	
								 	echo '<td>'.$row[0].'</td>';
								 	echo '<td>'.$row[1].'</td>';
								 	echo '<td>'.$row[2].'</td>';
								 	echo '<td><button type="button" id = "'.$row[2].'-row-button" class="btn my-btn approve-user-btn">Approve</button></td>';
									echo "</tr>";
								
								}
							?>
							
						</tbody>
					</table>
				</div>
			</div>
</body>
</html>