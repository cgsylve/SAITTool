<!DOCTYPE html>
<html>
<head>
	<link href="HomePageStyle.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> <!-- jQuery 1.11 CDN -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> <!-- Bootstrap JS CDN -->
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"><!-- Bootstrap CSS CDN -->

  <code>
  <script type="text/javascript">
  $(document).ready(function(){
  	$("#logoutLink").click(function(){
  		$("#logoutForm").submit();
  	});
  });
  </script>
  </code>
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
		        
		        <li class="active"><a href="HomePage.php">Home</a></li>
		        <li><a href="AssignmentsPage.php">Assignments</a></li> 
		        <li><a href="TonerPage.php">Toner</a></li> 
		        <li><a href="#">About</a></li>
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
						echo '<li>
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
		
		<div class="container-fluid">
			<div class="fill">
					<div class="row">
						<div id="jumboWrapper" class="col-xs-12">
							<div class="jumbotron">
									<h1>Welcome To The SAIT Web Tool</h1>
									<p>The home for everyday SAIT Help Desk processes</p>
									<p>This page was coded by Caleb Sylvester</p>
									<p>The purpose of this document is to provide a proof-of-concept design to the SAIT Help Desk</p>
									<hr class="jumbo-hr">
									<h2> Technologies Used</h2>
									<p>The different technologies used in this were JavaScript, jQuery, HTML5, CSS3, PHP, Bootstrap, and Git</p>
									<p>A link to the GitHub repository is located <a href="https://github.com/cgsylve/SAITTool">right here.</a>
							</div>
						</div>
					</div>
					
			
				<div class="row">
				<div class="footer">

					<div class="footer-item col-xs-4">
						<span class="glyphicon glyphicon-road" aria-hidden="true"></span>
						<h3>Efficiency</h3>
						<hr class="footer-hr">
						<p>Instead of going to multiple places to check things like toner inventory and reservations scheduled
						for later today, you can just use the handy tools that this site has! This means that you can spend less
						time digging through work groups and folders, and more time focused on resolving incidents.
					</div>
					<div class="footer-item col-xs-4">
						<span class="glyphicon glyphicon-hdd" aria-hidden="true"></span>
						<h3>Information</h3>
						<hr class="footer-hr">
						<p>This is a one-stop-shop for many repetitive tasks that the help desk has to do each day. Keeping information
						in a centralized place not only makes things more efficient, but it means it is easier to do the mundane tasks 
						and less mistakes will be made. This leds to the all-imporant accuracy of information.
					</div>
					<div class="footer-item col-xs-4">
						<span class="glyphicon glyphicon-leaf" aria-hidden="true"></span>
						<h3>Responsiveness</h3>
						<hr class="footer-hr">
						<p>This website was coded using Twitter Bootstrap. This means that the site
						works just as well on a mobile device or smaller screen as it does on a normal monitor. </p>
					</div>
				</div>	
			</div>	
		</div>
	</div>

</body>
</html>