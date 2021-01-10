<html>

    <head>
        <!-- Compatibility -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width , initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!-- My Css -->
        <link rel="stylesheet" href="../CSS/ForgotPasswd.css">
       
        <title>TeeLayLay</title>
    </head>

    <body>
        
        <?php
		
        $selector = $_GET["selector"];
        $validator = $_GET["validator"];
		
		session_start();
		
		$_SESSION['selector'] = $selector;
		$_SESSION['validator'] = $validator;

		   if (isset($_GET["pwdmatching"])) {
       		if ($_GET["pwdmatching"]=="dontmatch") {
				?>
            	<div class="alert alert-danger text-center" role="alert">
  					Passwords do not match!
				</div>
				<?php
        	}
    	 }
		
        if (empty($selector) || empty($validator)) {
        ?>
        <p class="alert alert-danger d-flex justify-content-center align-items-center" role="alert">Couldn't validate your request! <a href="reset-password.php"><strong>Return back</strong></a></p>
        <?php    
        }else {
            if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
        ?>
            <div id="forgot" class="forgot">
                <div class="d-flex justify-content-center align-items-center forgot-container">
                    <form class="forgot-form text-center" action="update-password.php" method="POST">
                        <h1 class="logo mb-3 font-weight-light">TeeLayLay</h1>
                        <p> Create new password </p>
                        <div class="form-group">
                            <input type="hidden" name="selector" value="<?php  echo $selector;?>"></input>
                            <input type="hidden" name="validator" value="<?php  echo $validator;?>"></input>
                            <input name="password" type="password" class="form-control rounded-pill form-control-lg" placeholder="Password" autocomplete="off" required>
                            <input name="passwordrepeat" type="password" class="form-control mt-1 rounded-pill form-control-lg" placeholder="Repeat Password" autocomplete="off" required>
                        </div>
                        <button name="submit" type="submit" class="btn btn-warning mt-3 rounded-pill btn-lg btn-block">Send</button>
                        <p class="last mt-3 font-weight-normal">Did you just remembered your password? <a href="../../index.php"><strong>Return to Login</strong></a></p>
                    </form>
                </div>
            </div>
        <?php
            }
        }
        ?>

    <!-- Bootstrap scripts Ver 4.5 -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    </body>

</html>
