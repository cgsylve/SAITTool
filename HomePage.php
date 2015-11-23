<!DOCTYPE html>
<html>
<head>
	<link href="HomePageStyle.css" rel="stylesheet">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <code>
  <script type="text/javascript">

  $(document).ready(function(){

  });

  </script>
  </code>
</head>
<body>
	<div class="jumboContainer">
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
		      	echo "Welcome, ".$_SESSION['fname'];
		      ?>
		      </a>
		    </div>
		    
		    <div class="collapse navbar-collapse">
		      <ul class="nav navbar-nav">
		        
		        <li class="active"><a href="HomePage.php">Home</a></li>
		        <li><a href="AssignmentsPage.php">Assignments</a></li> 
		        <li><a href="#">Toner</a></li> 
		        <li><a href="#">About</a></li>
		      </ul>
		    </div>
		   	
		  </div>
		</nav> <!-- End Nav -->

		<div id="jumboWrapper">
		<div class="jumbotron">
				<h1>Welcome To The SAIT Web Tool</h1>
				<p>The home for everyday SAIT Help Desk processes</p>
			</div>
		</div>
		<div class="footer">
				<div class="footer-item">
					<span class="glyphicon glyphicon-road" aria-hidden="true"></span>
					<h3>Efficiency</h3>
					<hr>
					<p>Instead of going to multiple places to check things like toner inventory and reservations scheduled
					for later today, you can just use the handy tools that this site has! This means that you can spend less
					time digging through work groups and folders, and more time focused on resolving incidents.
				</div>
				<div class="footer-item">
					<span class="glyphicon glyphicon-hdd" aria-hidden="true"></span>
					<h3>Information</h3>
					<hr>
					<p>This is a one-stop-shop for many repetitive tasks that the help desk has to do each day. Keeping information
					in a centralized place not only makes things more efficient, but it means it is easier to do the mundane tasks 
					and less mistakes will be made. This leds to the all-imporant accuracy of information.
				</div>
				<div class="footer-item">
					<span class="glyphicon glyphicon-leaf" aria-hidden="true"></span>
					<h3>Responsiveness</h3>
					<hr>
					<p>This website was coded using Twitter Bootstrap. This means that the site
					works just as well on a mobile device or smaller screen as it does on a normal monitor. </p>
				</div>
			</div>		
	</div>
</body>
</html>