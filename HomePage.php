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
  	
  	var students = [
  		["Caleb Sylvester", "Seat 2", "In"],
  		["Logan Janda", "Seat 1", "In"],
  		["Rebecca Trost", "Back of House", "Out"],
  		["Mike Stenson", "Team Lead", "In"]
  	];

  	var reservations = [
  		["Incident 61711", "LP 2-7", "Caleb"],
  		["Incident 60223", "DP1", "Mike"]
  	];

  	var calls = [
  		["Incident 56112", "Call", "Install SoftChalk"]
  	];
  });
  </script>
  </code>
</head>
<body>
	<div class="container" id ="rosterSection">
		<ul class="nav nav-pills">
		  <li class="active"><a href="#daily-reservations" data-toggle="pill">Reservations</a></li>
		  <li><a href="#daily-calls" data-toggle="pill">Calls</a></li>
		  <li><a href="#current-roster" data-toggle="pill">Current Roster</a></li>
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
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>61711</td>
								<td>LP 2-7</td>
								<td>Caleb</td>
							</tr>
							<tr>
								<td>61113</td>
								<td>DP 1</td>
								<td>Mike</td>
							</tr>
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
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>54321</td>
								<td>Install Soft Chalk</td>
								<td>Caleb</td>
							</tr>
							<tr>
								<td>12345</td>
								<td>Follow Up For Dana</td>
								<td>Mike</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div id="current-roster" class="tab-pane fade in">
				<p>Caleb Sylvester <span class="badge">Seat 2</span></p>
				<p>Logan Janda <span class="badge">Back of House</span></p><br>
			</div>
		</div>
	</div>
	<!-- End Pill Section -->
	<div class="container">
	<div id="myAlert" class="alert alert-success fade in" data-alert="alert">
  		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    	<strong>Success!</strong> Thank you for logging in.
	</div>
	</div>
</body>
</html>