<!DOCTYPE html>
<html>
	<head>
		<title>Caleb Sylvester - Java Dev</title>
		<link rel="stylesheet" type="text/css" href="HomepageCSS.css">
		<link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="bootstrap.min.css"></script>
		<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
		<script>
				$(function() {
					$('a[href*=#]:not([href=#])').click(function() {
						if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
							var target = $(this.hash);
							target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
								if (target.length) {
									$('html,body').animate({
									scrollTop: target.offset().top
									}, 1000);
									return false;
								}
							}
						});
					});

		</script>

	
	</head>
	<body>
	
		
		<div id="titlePage" class="page">
			<div id="titleNav" class="nav">
				<ul>
					
					<li><a href="#aboutMeAnchor">About Me</a></li> 
					
					<li><a href="#bodyOfWorkAnchor">My Work</a></li> 

					<li><a href="#contactMeAnchor">Contact Me</a></li>
				</ul>
			</div>
			<div id ="titleText">
				<h1>Welcome to Caleb Sylvester's homepage</h1>
				<p>This site is coded from scratch by me!</p>
			</div>
			<div class="circular-image">
				<img src="rsz_profile.jpg">
			</div>
			
		</div>
		<a id="aboutMeAnchor">
		<div id="aboutMePage" class="page">
			<p>
				I am currently an Information Systems major, specializing in Web App Development at Illinois State University.
			</p>
			<p>
				My prior development experience consists of Java development in an enterprise web environment. This consisted of Java, Spring MVC, Freemarker, and SQL, as well as familiarity with the SDLC and MVC concepts.
			</p>
			<p>
				I enjoy gaming, watching sports, playing rugby, and doing web development in my spare time. 
			</p>
		</div>
		<a id="bodyOfWorkAnchor">
		<div id = "bodyOfWorkPage" class="page">
			<p>
				My IT background consists of working at the Student Affairs IT Support desk at Illinois State University. We service hundreds of faculty/staff, as well as 1,000+ computers, printers, thin clients, and more.
			</p>
			<p>
				In addition to this, I have interned at Discover Financial Services, working in an enterprise environment with Java and Spring MVC, with an Oracle database using SQL.
			</p>
			<div class="nav">
				<ul>
					<li><a href="http://calebsylvester.com/SAITTool/LoginPage.php">Student Affairs IT Web Tool</a></li>
				</ul>

			</div>
		</div>
			
		<a id="contactMeAnchor">
		<div id="contactMePage" class="page">
		<h2>Contact Me</h2>
			<div id="contactMeNav" class="nav">
				<ul>
					
					<li><i class="fa fa-facebook-square" id="FB"></i><a href="https://facebook.com/caleb.sylvester.3">Facebook</a></li>
					
					<li><i class="fa fa-twitter-square"></i><a href="https://twitter.com/calebsylves">Twitter</a></li>
					
					<li><i class="fa fa-github-square"></i><a href="https://github.com/cgsylve">GitHub</a></li>	
				<ul>
			</div> 
		</div>
		<div id="mainFooter" class="footer">
			<div id="mainFooterNav" class="nav">
				<ul>
					<li><a href="http://calebsylvester.com/FeedbackPage/feedback.php">Give Feedback</a></li> - 
					<li><a href="http://it.ilstu.edu">Illinois State University School of IT</a></li> - 
					<li><a href="http://spring.io/">Spring MVC</a></li>
				</ul>
			</div>
		</div>
		
	</body>
</html>