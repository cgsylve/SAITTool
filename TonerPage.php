<!DOCTYPE html>
<html>
<head>
	<title>Toner Inventory</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="TonerPageStyle.css" rel="stylesheet">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <code>
  <script type="text/javascript">

 

  $(document).ready(function(){

  		$("#logoutLink").click(function(){
  			$("#logoutForm").submit();
  		});

  		$("#tonerBody button").on("click", function(){
  			var row = $(this).closest("tr"); 
  			var tds = row.find("td");

  			var info = new Array();

  			$.each(tds, function(){
  				info.push($(this).text());
  			});

  			info.splice(-2, 2);

  			$("#editTonerHeader").val(info[0]);
  			$("#editTonerHeader").text("Edit Toner " + info[0]);
  			$("#editUsedInInput").val(info[1]);
  			$("#editColorInput").val(info[2]);
  			$("#editCountInput").val(info[3]);
  			$("#editNeedsInput").val(info[4]);
  			

  		}); 

  		$("#deleteToner").on("click", function(event){
			var checked = new Array();
			event.preventDefault();
			
			$("input:checkbox[name=delete]:checked").each(function(){
				checked.push($(this).val());
							
			});	
			

			$.ajax({
				url: 'toner.php',
				type: 'post',
				data: {'action': 'delete', 'list': checked},
				success: function(data){
						if (data == "Deleted"){
							
							location.reload();
						}

						else{
							alert("Data: " + data);
						}
						
					},
				error: function(xhr, desc, err){
					alert("fail");
				}

			});		
		});

		$("#updateToner").on("click", function(event){
			
			var name = $("#editTonerHeader").val();
 			var usedIn = $("#editUsedInInput").val();
 			var color = $("#editColorInput").val();
 			var count = $("#editCountInput").val();
 			var needs = $("#editNeedsInput").val();

 			event.preventDefault();

 			

 			$.ajax({
 				url: 'toner.php',
 				type: 'post',
 				data: {'action': 'updateToner', 'name': name, 'usedIn': usedIn, 'color': color, 'count': count, 'needs': needs},
 				success: function(data){
 					if(data == "Success"){
 						location.reload();
 					}
 				},
 				error: function(xhr, desc, err){
 					alert("Failed");
 				}
 			});
		});


	  	 $("#createToner").click(function(event){

	  	 			var name = $("#tonerInput").val();
	  	 			var usedIn = $("#usedInInput").val();
	  	 			var color = $("#colorInput").val();
	  	 			var count = $("#countInput").val();
	  	 			var needs = $("#needsInput").val();
	               	
	                event.preventDefault();
	                
	                $.ajax({
	                     url: 'toner.php',
	                     type: 'post', 
	                     data: {'action': 'createToner', 'name': name, 'usedIn': usedIn, 'color': color, 'count': count, 'needs': needs},
	                     success: function(data){
	                        if(data == "Success"){
	                            
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
  });
  </script>
  </code>

</head>
<body>
	<div class="wrap">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
		      	echo "Welcome, ".$_SESSION['fname'];
		      ?>
		      </a>
		    </div>
		    
		    <div class="collapse navbar-collapse">
		      <ul class="nav navbar-nav">
		        
		        <li><a href="HomePage.php">Home</a></li>
		        <li><a href="AssignmentsPage.php">Assignments</a></li> 
		        <li class="active"><a href="TonerPage.php">Toner</a></li> 
		        <li><a href="#">About</a></li>
		        <li class="dropdown">
		        	<a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" role="button" aria-haspopup="true" aria-expanded="false">
               			Who's Here?
               			<span class = "caret"></span>
            		</a>
            		<ul class = "dropdown-menu">

            			<?php
               			session_start();
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
               			?>
		               
		            </ul>
				</li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		      	<li>
		      		<form id="logoutForm" name="logoutForm" action="logout.php" method="post">
		      			<p class="navbar-text"><a href="#" id="logoutLink">Log Out</a></p>
		      		</form>
		      	</li>
		      </ul>
		    </div>
		   	
		  </div>
		</nav>

		<div class="container" id ="rosterSection">
		

		<div class="tab-content">
			<div id="daily-reservations" class="tab-pane fade in active">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Toner Name</th>
								<th>Used In Printer Model(s)</th>
								<th>Toner Color</th>
								<th>Toner Count</th>
								<th>Needs Ordered</th>
								<th>Delete</th>
								<th>Edit</th>
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
							    $sql = "SELECT name, used_in, color, count, needs_ordered FROM toner";

								$retval = mysql_query($sql, $conn);
								while($row = mysql_fetch_row($retval)){
									
								 	
								 	echo "<tr id = '".$row[0]."-row'>";
								 	echo "<td>".$row[0]."</td>";
								 	echo "<td>".$row[1]."</td>";
								 	echo "<td>".$row[2]."</td>";
								 	echo "<td>".$row[3]."</td>";
								 	echo "<td>".$row[4]."</td>";
								 	echo '<td><label class="checkbox-inline"><input type="checkbox" name="delete" id="delete" value="'.$row[0].'">Delete</label></td>';
								 	echo '<td><button type="button" id = "'.$row[0].'-row-button"class="btn my-btn" data-toggle="modal" data-target="#editModal">Edit This Toner</button></td>';
									echo "</tr>";
								
								}
							?>
							
						</tbody>
					</table>
				</div>
			</div>
	
	<!-- End Pill Section -->

	<!-- Trigger the modal with a button -->
	<form id ="modalAddForm">
		<button type="button" class="btn my-btn btn-lg" data-toggle="modal" data-target="#myModal">Add A Toner</button>

		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  	<div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Add A Toner</h4>
			      </div>
			      <div class="modal-body">

			      	<div class="form-group">
				      	<label for="incidentInput">Toner Name:</label>
				        <input type="text" class="form-control" id="tonerInput" name="tonerInput" required>
			        </div>

			        <div class="form-group">
			        	<label for="summaryInput">Used In Printer Model(s): </label>
			        	<input type="text" class="form-control" id="usedInInput" name="usedInInput" required>
			      	</div>
			      	<div class="form-group">
			      		<label for="nameAssigned">Toner Color:</label>
			      		<input type="text" class="form-control" id="colorInput" name="colorInput" required>
			      	</div>
			      	<div class="form-group">
			      		<label for="emailAssigned">Toner Count:</label>
			      		<input type="text" class="form-control" id="countInput" name="countInput" required>
			      	</div>
			      	<div class="form-group">
			      		<label for="emailAssigned">Needs Ordered:</label>
			      		<input type="text" class="form-control" id="needsInput" name="needsInput" required>
			      	</div>
			      	

			      <div class="modal-footer">
			      	<button type="button" class="btn btn-lg btn-primary" id="createToner" name = "createToner">Submit</button>
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

		  	</div>
		</div>

		
		</div>
		<button type="button" class="btn my-btn btn-lg" id="deleteToner" name="deleteToner">Delete Selected Toner(s)</button>
	</form>

	<form id ="modalEditForm">
		<div id="editModal" class="modal fade" role="dialog">
		  	<div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" id ="editTonerHeader" value=""></h4>
			      </div>
			      <div class="modal-body">

			        <div class="form-group">
			        	<label for="summaryInput">Used In Printer Model(s): </label>
			        	<input type="text" class="form-control" id="editUsedInInput" name="editUsedInInput" required>
			      	</div>
			      	<div class="form-group">
			      		<label for="nameAssigned">Toner Color:</label>
			      		<input type="text" class="form-control" id="editColorInput" name="editColorInput" required>
			      	</div>
			      	<div class="form-group">
			      		<label for="emailAssigned">Toner Count:</label>
			      		<input type="text" class="form-control" id="editCountInput" name="editCountInput" required>
			      	</div>
			      	<div class="form-group">
			      		<label for="emailAssigned">Needs Ordered:</label>
			      		<input type="text" class="form-control" id="editNeedsInput" name="editNeedsInput" required>
			      	</div>
			      	

			      <div class="modal-footer">
			      	<button type="button" class="btn btn-lg btn-primary" id="updateToner" name = "updateToner">Update</button>
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

		  	</div>
		</div>
	</form>
	</div>
</body>
</html>