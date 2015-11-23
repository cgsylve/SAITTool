<!DOCTYPE html>
<html>
<head>
	<link href="AssignmentsPageStyle.css" rel="stylesheet">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <code>
  <script type="text/javascript">

 

  $(document).ready(function(){

	  	 $("#createAssignSubmit").click(function(event){

	  	 			var incident = $("#incidentInput").val();
	  	 			var summary = $("#summaryInput").val();
	  	 			var name = $("#nameAssigned").val();
	  	 			var email = $("#emailAssigned").val();
	  	 			var type = $("#typeAssigned").val();
	               	
	                event.preventDefault();
	                
	                $.ajax({
	                     url: 'roster.php',
	                     type: 'post', 
	                     data: {'action': 'createAssignment', 'incident': incident, 'summary': summary, 'name': name, 'email': email, 'type': type},
	                     success: function(data){
	                        if(data == "Success"){
	                            alert("Added");
	                            location.reload();

	                        }
	                        
	                        else{
	                        	alert("Not Added");
	                        }
	                     }, // end success function
	                     error: function(xhr, desc, err){
	                        alert(xhr);
	                        
	                     }  // end error function
	                }); // End ajax
	        });

		$("#deleteAssignments").click(function(event){
			var checked = "1";
			event.preventDefault();
			
			// $("input:checkbox[name=check]:checked").each(function(){
			// 	checked.push($(this).val());				
			// });	
			

			$.ajax({
				url: 'roster.php',
				type: 'post',
				data: {'action': 'delete', 'list': checked},
				success: function(data){
						alert("Data: " + data);
						
					},
				error: function(xhr, desc, err){
					alert("fail");
				}

			});		
		});

  });
  </script>
  </code>
</head>
<body>

	<?php
	session_start();
		$username = "root";
	    $password = "root";
	    $hostname = "localhost"; 

	        //connection to the database
	    $conn = mysql_connect($hostname, $username, $password) 
	    	or die("Unable to connect to MySQL");

	    mysql_select_db("saitdb");
	    $sql = "SELECT incident, summary, name, type, email FROM assignments";

	?>

	<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
		    <span class="sr-only">Toggle Navigation</span>
		    <span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>

		    </button>

		      <a class="navbar-brand" href="#">
		      <?php
		      	session_start();
		      	echo "Welcome, ".$_SESSION['email'];
		      ?>
		      </a>
		    </div>
		    
		    <div class="collapse navbar-collapse">
		      <ul class="nav navbar-nav">
		        
		        <li><a href="HomePage.php">Home</a></li>
		        <li class="active"><a href="AssignmentsPage.php">Assignments</a></li> 
		        <li><a href="#">Toner</a></li> 
		        <li><a href="#">About</a></li>
		      </ul>
		    </div>
		   	
		  </div>
		</nav>
	<div class="container" id ="rosterSection">
		<ul class="nav nav-pills">
		  <li class="active"><a href="#daily-reservations" data-toggle="pill">Reservations</a></li>
		  <li><a href="#daily-calls" data-toggle="pill">Calls</a></li>
		  
		</ul>

		<div class="tab-content">
			<div id="daily-reservations" class="tab-pane fade in active">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Incident</th>
								<th>Summary</th>
								<th>Assigned</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody id="resBody">
							
							<?php
								$retval = mysql_query($sql, $conn);
								while($row = mysql_fetch_row($retval)){
									
								 	if($row[3] == "Res"){
								 	echo "<tr>";
								 	echo "<td>".$row[0]."</td>";
								 	echo "<td>".$row[1]."</td>";
								 	echo "<td>".$row[2]."</td>";
								 	echo '<td><label class="checkbox-inline"><input type="checkbox" name="check" id="check" value="'.$row[0].'">Delete</label></td>';
									echo "</tr>";
								}
								}
							?>
							
						</tbody>
					</table>
				</div>
			</div>

			<div id="daily-calls" class="tab-pane fade in">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Incident</th>
								<th>Summary</th>
								<th>Assigned</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody id="callBody">
						
						<?php
								 $retval = mysql_query($sql, $conn);
								 while($row = mysql_fetch_row($retval)){									
								 	if($row[3] == "Call"){
								 	echo "<tr>";
								 	echo "<td>".$row[0]."</td>";
								 	echo "<td>".$row[1]."</td>";
								 	echo "<td>".$row[2]."</td>";
								 	echo '<td><label class="checkbox-inline"><input type="checkbox" name="check" id="check" value="'.$row[0].'">Delete</label></td>';
								 	echo "</tr>";
								 }
								 }
							?>
						
						</tbody>
					</table>
				</div>
			</div>

			
		</div>
	
	<!-- End Pill Section -->

	<!-- Trigger the modal with a button -->
	<form id ="modalForm">
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add An Assigmnet</button>

		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  	<div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Add An Assignment</h4>
			      </div>
			      <div class="modal-body">

			      	<div class="form-group">
				      	<label for="incidentInput">Incident:</label>
				        <input type="text" class="form-control" id="incidentInput" name="incidentInput">
			        </div>

			        <div class="form-group">
			        	<label for="summaryInput">Summary: </label>
			        	<input type="text" class="form-control" id="summaryInput" name="summaryInput">
			      	</div>
			      	<div class="form-group">
			      		<label for="nameAssigned">Name Of Person Assigned:</label>
			      		<input type="text" class="form-control" id="nameAssigned" name="nameAssigned">
			      	</div>
			      	<div class="form-group">
			      		<label for="emailAssigned">Email Of Person Assigned:</label>
			      		<input type="text" class="form-control" id="emailAssigned" name="emailAssigned">
			      	</div>
			      	<div class="form-group">
			      		<label for="typeAssigned">Type - Call Or Reservation (Enter "Call" or "Res"):</label>
			      		<input type="text" class="form-control" id="typeAssigned" name="typeAssigned">
			      	</div>

			      <div class="modal-footer">
			      	<button type="button" class="btn btn-lg btn-primary" id="createAssignSubmit" name = "createAssignSubmit">Submit</button>
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

		  	</div>
		</div>

		
		</div>
		<button type="button" class="btn btn-info btn-lg" id="deleteAssignments" name="deleteAssignments">Delete Selected Rows</button>
	</form>

	
</body>
</html>