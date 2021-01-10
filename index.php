<?php 
	include './Assets/PHP/redirect.php';
?>
<!DOCTYPE html>
<html>

    <head>
        <!-- Compatibility -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width , initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!-- My Css -->
        <link rel="stylesheet" href="Assets/CSS/LogRegStyle.css">
        <!-- Script that Hides/Shows the Register Form -->
        <script src="Assets/JS/HideShow.js"></script>

        <title>TeeLayLay</title>
    </head>
    <body>
		
		<?php

            if (isset($_GET["newpwd"])) {
                if ($_GET["newpwd"]=="success") {
					?>
					<div class="alert alert-success text-center"  role="alert">
 					 Your password has been reset successfully!
					</div>
					<?php
                }
            }
		
			if (isset($_GET["reset"])) {
       		 if ($_GET["reset"]=="success") {
					?>
            		<div class="alert alert-success text-center" role="alert">
  						Verification email has been sent to your address!
					</div>
					<?php
        		}
    		}
		
			if (isset($_GET["reset"])) {
       		 if ($_GET["reset"]=="failed") {
					?>
            		<div class="alert alert-danger text-center" role="alert">
  						Destination email is missing!
					</div>
					<?php
        		}
    		}
		
			if (isset($_GET["pwdchanged"])) {
       		 	if ($_GET["pwdchanged"]=="true") {
					?>
            			<div class="alert alert-success text-center" role="alert">
  							Your password has been reset!
						</div>
					<?php
        		}
    		}
			
			if (isset($_GET["login"])) {
       		 	if ($_GET["login"]=="no") {
					?>
            			<div class="alert alert-danger text-center" role="alert">
  							Account does not exist or login credentials are wrong!
						</div>
					<?php
        		}
    		}
        
        ?>


        <!-- Login Form -->
        <div id="Login" class="Login">
            <div class="d-flex justify-content-center align-items-center login-container">
                <form class="login-form text-center" action="./Assets/PHP/login.php" method="POST">
                    <h1 class="logo mb-3 font-weight-light">TeeLayLay</h1>
                    <div class="form-group">
                        <input name="email" type="email" class="form-control rounded-pill form-control-lg" placeholder="Email" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" class="form-control rounded-pill form-control-lg" placeholder="Password" autocomplete="off" required>
                    </div>
                    <div class="forgot-link form-group d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input name="i-remember" type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label font-weight-light" for="remember">Remember Password</label>
                        </div>
                        <a href="./Assets/PHP/reset-password.php">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn btn-warning mt-3 rounded-pill btn-lg btn-block">Log in</button>
                    <p class="last mt-3 font-weight-normal">Don't have an account? <a href="javascript:on()"><strong>Register Now</strong></a></p>
                </form>
            </div>
        </div>

        <!-- Register Form -->
        <div id="Register" class="Register">
            <div class="d-flex justify-content-center align-items-center login-container">
                <form class="login-form text-center" action="./Assets/PHP/register.php" method="POST">
                    <h1 class="logo mb-3 font-weight-light">TeeLayLay</h1>
                    <p>Insert a spiritual message here</p>
                    <div class="form-group">
                        <input name="firstname" type="text" class="form-control rounded-pill form-control-lg" placeholder="Firstname" autocomplete="off" required >
                    </div>
                    <div class="form-group">
                        <input name="lastname" type="text" class="form-control rounded-pill form-control-lg" placeholder="Lastname" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" class="form-control rounded-pill form-control-lg" placeholder="Password" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input name="conf_password" type="password" class="form-control rounded-pill form-control-lg" placeholder="Confirm password" autocomplete="off" required>
                    </div>
                    <div class="form-group">  
                        <select name="sex" class="form-control rounded-pill form-control-lg" required>
                            <option value="">Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="LGBTQA">LGBTQA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input name="birthday" type="text" onfocus="(this.type='date')" onfocusout="(this.type='text')" class="form-control rounded-pill form-control-lg" placeholder="Birthday" autocomplete="off" required>
                    </div>
					<div class="form-group">
                        <input name="username" type="text" class="form-control rounded-pill form-control-lg" placeholder="Username" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input name="email" type="email" class="form-control rounded-pill form-control-lg" placeholder="Email Address" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input name="phone" type="tel" class="form-control rounded-pill form-control-lg" placeholder="Phone number" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input name="city" type="text" class="form-control rounded-pill form-control-lg" placeholder="City" autocomplete="off" required>
                    </div>
                    <div class="forgot-link form-group d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input name="terms" type="checkbox" class="form-check-input" id="terms" required>
                            <label class="form-check-label font-weight-light" for="terms">Agre to terms and conditions</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning mt-3 rounded-pill btn-lg btn-block">Register</button>
                    <p class="last mt-3 font-weight-normal">Have an account? <a href="javascript:off()"><strong>Login Now</strong></a></p>
                </form>
    
            </div>
        </div>

        <!-- Bootstrap scripts Ver 4.5 -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        
    </body>

</html>
