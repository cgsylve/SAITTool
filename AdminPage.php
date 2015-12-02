<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap CSS CDN -->
	<link href="AdminPageStyle.css" rel="stylesheet">
	<link href="stickyfooter.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> <!-- Bootstrap JS CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> <!-- jQuery 1.11 CDN -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


    <script type="text/javascript">

    $(document).ready(function(){


  	$("#logoutLink").click(function(){
  		$("#logoutForm").submit();
  	});
  	
    	$("#approveBody button").on("click", function(event){

    		event.preventDefault();
    		
  			var row = $(this).closest("tr"); 
  			var tds = row.find("td");

  			var info = new Array();

  			$.each(tds, function(){
  				info.push($(this).text());
  			});

  			info.splice(0, 2);

  			

  			var email = info[0];

  			$.ajax({
  				url: "admin.php",
  				type: "post",
  				data: {"action": "approve", "email": email},
  				success: function(data){
  					
  					location.reload();
  				},
  				error: function(){
  					alert("Error");
  				}
  			});
  			

  		}); 
    });
    </script>
</head>
<body>

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
	?>

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
		        <li><a href="TonerPage.php">Toner</a></li> 
		        <li class="visible-lg-inline"><a href="http://calebsylvester.com">Contact Me</a></li>
		        <li class="dropdown">
		        	<a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" role="button" aria-haspopup="true" aria-expanded="false">
               			Who's Here?
               			<span class = "caret"></span>
            		</a>
            		<ul class = "dropdown-menu">

            			<?php
               			session_start();
               			 	$retval = mysql_query($sql, $conn);
	    					while($row = mysql_fetch_row($retval)){
	    						echo '<li><a href = "#">'.$row[0].'</a></li>';
	    					}
               			?>
		               
		            </ul>
				</li>

				<?php
					session_start();
					if($_SESSION['admin'] == 'y'){
						echo '<li class="active">
								<a href = "AdminPage.php">Admin</a>
							</li>';
					}
				?>

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
		</nav> <!-- End Nav -->

	<div class="container wrap" id ="approveSection">	

			<div id="unapproved-users-div" class="tab-pane fade in active">
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
						<tbody id="approveBody">
						
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

			
		</div>
	
	<!-- End Pill Section -->

	
	</div>

	<footer class="stickyfooter visible-lg-block">
      <div class="container">
	      <div class="row">
	      	<div class="col-lg-4">
	      		
	        		<i class="fa fa-github-square" id="GH"></i><p class="text-muted"><a href="http://github.com/cgsylve">GitHub</a></p>
	        	
	        </div>
	        <div class="col-lg-4">
	        	<i class="fa fa-twitter-square" id="TW"></i><p class="text-muted"><a href="http://twitter.com/calebsylves">Twitter</a></p>
	        </div>
	        <div class="col-lg-4">
	        	<i class="fa fa-facebook-square" id="FB"></i><p class="text-muted"><a href="http://facebook.com/caleb.sylvester.3">Facebook</a></p>
	        </div>
	      </div>
      </div>
    </footer>

</body>
</html>