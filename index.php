<?php include 'redirectifloggedin.php';?>
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
        <!-- Script tha Hides/Shows the Register Form -->
        <script src="Assets/JS/HideShow.js"></script>

        <title>TeeLayLay</title>
    </head>
    <body>

        <!-- Login Form -->

        <div id="Login" class="Login">
            <div class="d-flex justify-content-center align-items-center login-container">
                <form class="login-form text-center" action="login.php" method="POST">
                    <h1 class="logo mb-5 font-weight-light">TeeLayLay</h1>
                    <div class="form-group">
                        <input name="email" type="email" class="form-control rounded-pill form-control-lg" placeholder="Username" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" class="form-control rounded-pill form-control-lg" placeholder="Password" autocomplete="off" required>
                    </div>
                    <div class="forgot-link form-group d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input name="i-remember" type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label font-weight-light" for="remember">Remember Password</label>
                        </div>
                        <a href="#">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase">Log in</button>
                    <p class="last mt-3 font-weight-normal">Don't have an account? <a href="javascript:on()"><strong>Register Now</strong></a></p>
                </form>
            </div>
        </div>

        <!-- Register Form -->

        <div id="Register" class="Register">
            <div class="d-flex justify-content-center align-items-center login-container">
                <form class="login-form text-center" action="register.php" method="POST">
                    <h1 class="logo mb-5 font-weight-light">TeeLayLay</h1>
                    <p>NA fas ta skata san na min yparxei avrio</p>
                    <div class="form-group">
                        <input name="firstname" type="text" class="form-control rounded-pill form-control-lg" placeholder="Firstname" autocomplete="off" required>
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
                    <button type="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase">Register</button>
                    <p class="last mt-3 font-weight-normal">Have an account? <a href="javascript:off()"><strong>Login Now</strong></a></p>
                </form>
    
            </div>
        </div>

        <!-- Bootstrap Bundle with popper -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    </body>

</html>