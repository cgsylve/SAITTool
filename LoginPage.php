<!DOCTYPE html>
<html>
<head>
	<title>Login to the SAIT web tool</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap CSS CDN -->
	 <link href="LoginPageStyle.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> <!-- jQuery 1.11 CDN -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> <!-- Bootstrap JS CDN -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   
    <link href='https://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet' type='text/css'>

    <script type="text/javascript">
        $(document).ready(function(){
            

            $("#loginSubmit").click(function(event){
               var email = $("#inputEmail").val();
                var pass = $("#inputPassword").val();
                event.preventDefault();
                
                $.ajax({
                     url: 'login.php',
                     type: 'post', 
                     data: {'action': 'login', 'email': email, 'pass': pass},
                     success: function(data){
                        if(data == "wrong"){
                            
                            $("#failCredsAlert").toggleClass("show");
                        }
                        else if (data =="not approved"){
                            
                            $("#failApprovalAlert").toggleClass("show"); 
                        }
                        else{                          
                           

                            window.location.replace("HomePage.php");
                        }
                     }, // end success function
                     error: function(xhr, desc, err){
                        alert("fail");
                     }  // end error function
                }); // End ajax
                           
            });

            $("#createSubmit").click(function(event){
                var fname = $("#fNameInput").val();
                var lname = $("#lNameInput").val();
                var email = $("#emailInputSignup").val();
                var confirmEmail = $("#emailConfirmSignup").val();
                var pass = $("#passwordSignup").val();            
                var confirmPass = $("#confirmPasswordSignup").val();
                
                if(email != confirmEmail){
                    alert("Make sure your emails match");
                }

                else if(pass != confirmPass){
                    alert("Make sure your passwords match");
                }
                
                else{
                event.preventDefault();

                $.ajax({
                    url: 'login.php',
                    type: 'post',
                    data: {'action': 'create', 'fname': fname, 'lname': lname, 'email': email, 'pass': pass},
                    success: function(data){
                        if(data == "Failed"){
                            $("#failAlert").toggleClass("show");
                           
                        }
                        else if(data == "Success"){
                            $("#successAlert").toggleClass("show");
                            var delay = 2000; //Your delay in milliseconds

                            setTimeout(function(){ 
                                window.location = "http://calebsylvester.com/SAITTool/LoginPage.php"; 
                            }, delay);
                        }

                        else {
                            
                        }
                    }, //end success
                    error: function(data){
                        $("#failAlert").toggleClass("show");
                        alert("Ajax fail");
                    } // end error 
                    
                }); //end ajax
            }
            });
    }); 
    </script>

</head>

<body>

	<div class="container">
        <div class="row">
            
    	   <h2 id="title">Welcome to the SAIT Online Tool</h2>
           
        </div>

	
	
      <form class="form-signin" id="signin">
        <h2 class="form-signin-heading">Login to the tool</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name = "inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="button" id="loginSubmit" name="loginSubmit">Sign in</button> 
    </form> <!-- END Sign In Form -->
    
    <div class="orDiv">
   		<h1 id="orLogin">Or</h1>
   	</div>
    
    <form class="form-create-account">
    	<h2 class="form-create-heading"> Create Account </h2>
    	<input type="text" id="fNameInput" name="fNameInput" class="form-control" placeholder="First Name" required>
    	<input type="text" id="lNameInput" name="lNameInput" class="form-control" placeholder="Last Name" required>
    	<input type="email" id="emailInputSignup" name="emailInputSignup" class="form-control" placeholder="Email" required>
    	<input type="email" id="emailConfirmSignup" class="form-control" placeholder="Confirm Email" required>
    	<input type="password" id="passwordSignup" name="passwordSignup" class="form-control" placeholder="Password" required>
    	<input type="password" id="confirmPasswordSignup" class="form-control" placeholder="Confirm Password" required>
    	<button class="btn btn-lg btn-primary btn-block" type="button" id="createSubmit" name="createSubmit">Create</button>
    </form> <!-- END Create Account Form -->
    <br>


    <div id="failCredsAlert" class="alert alert-danger fade in hide" data-alert="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warning!</strong> Invalid credentials. Please try again.
    </div>

    <div id="failApprovalAlert" class="alert alert-danger fade in hide" data-alert="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warning!</strong> Your account is not approved at this time. Please try again later.
    </div>

    <div id="successAlert" class="alert alert-success fade in hide" data-alert="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Your account has been created. Your account must be approved before logging in, so please come back later.
    </div>

    <div id="failAlert" class="alert alert-danger fade in hide" data-alert="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warning!</strong> Account was not created.
    </div>

    

    </div> <!-- /container -->

</body>

</html>