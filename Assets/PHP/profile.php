<!DOCTYPE html>
<html>

<head>
    <!-- Compatibility -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Font Awsome 5.15.1 -->
    <script src="https://kit.fontawesome.com/8632620e61.js" crossorigin="anonymous"></script>
    <!-- My Css -->
    <link rel="stylesheet" href="../CSS/Profile.css">
    <!-- Under here import the scripts we created-->


    <title>TeeLayLay</title>
</head>


<body>

 <!-- BEGIN Navigation Bar -->
    <nav class="navbar navbar-dark bg-dark sticky-top navbar-expand-lg">
        <a class="AppLogo navbar-brand" href="main.php">TeeLayLay</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a id="homepage" class="nav-link fas fa-home mt-1" href="main.php">Home</a>
                </li>
                <li class="nav-item">
                    <a id="homepage" class="nav-link fas fa-inbox mt-1" href="inbox.php">Inbox</a>
                </li>
                <li class="nav-item">
                    <a id="user-profile" class="nav-link fas fa-user mt-1 active" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a id="user-profile" class="nav-link log fas fa-sign-out-alt mt-1" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END Navigation Bar -->


<?php

    session_start();

    $email = $_SESSION['Email'];
	
    require 'connect.php';

    mysqli_set_charset($conn, "utf8");
	
	$sql = "SELECT * FROM Users,UsersContactDetails,LoginCredentials WHERE Users.ID = UsersContactDetails.ID AND Users.ID = LoginCredentials.ID AND EMAIL='$email'";

    $response = mysqli_query($conn, $sql);

    if(mysqli_num_rows($response) === 1) {

       $row = mysqli_fetch_assoc($response);

       $Data = array(
            'username'     =>  $row["Username"],
            'firstname'     =>  $row["FirstName"],
            'lastname'      =>  $row["LastName"],
            'email'         =>  $row["EMAIL"],
            'birthday'      =>  $row["BirthDay"],
            'city'          =>  $row["City"],
            'phone'         =>  $row["Phone"]
          );

    } else {

            ?>
				<div class="alert alert-danger text-center"  role="alert">
 					Session is lost!
				</div>
			<?php

    }
	
	
	if($_SERVER['REQUEST_METHOD'] =='POST' ){

           $fetchedData = array(
                'username'      =>  $_POST["username"],
                'firstname'     =>  $_POST["firstname"],
                'lastname'      =>  $_POST["lastname"],
                'email'         =>  $_POST["email"],
                'password'      =>  password_hash($_POST["password"], PASSWORD_DEFAULT),
                'city'          =>  $_POST["city"],
                'phone'         =>  $_POST["phone"]
          );
                
			
				$sql1 = "SELECT * FROM Users,UsersContactDetails,LoginCredentials WHERE Users.ID = UsersContactDetails.ID AND Users.ID = LoginCredentials.ID AND EMAIL = '$fetchedData[email]'";

    			$responseIfEmailExists = mysqli_query($conn, $sql1);
	
				$sql2 = "SELECT * FROM Users,UsersContactDetails,LoginCredentials WHERE Users.ID = UsersContactDetails.ID AND Users.ID = LoginCredentials.ID AND Username = '$fetchedData[username]'";

    			$responseIfUsernameExists = mysqli_query($conn, $sql2);
			
				if(mysqli_num_rows($responseIfEmailExists) === 0) {
					
					if(mysqli_num_rows($responseIfUsernameExists) === 0) {
						
						$sql = "UPDATE Users,UsersContactDetails,LoginCredentials SET FirstName='$fetchedData[firstname]' , LastName='$fetchedData[lastname]' , EMAIL='$fetchedData[email]' , Username='$fetchedData[username]' , PASSWD='$fetchedData[password]' , City='$fetchedData[city]' , Phone='$fetchedData[phone]' WHERE Users.ID = UsersContactDetails.ID AND Users.ID = LoginCredentials.ID AND EMAIL='$email'";
                
                        mysqli_query($conn,$sql);
						
				        mysqli_close($conn);

	           	        header('Location: logout.php');
						
					} else {
						
						?>
							<div class="alert alert-danger text-center"  role="alert">
 								This username already exists!
							</div>
						<?php
						mysqli_close($conn);
					}

				} else {
						
						?>
						<div class="alert alert-danger text-center"  role="alert">
 							This email already exists!
						</div>
					<?php
					mysqli_close($conn);
				}

        } 
    ?>

    <main id="profile" class="profile-settings">
        <div class="d-flex justify-content-center align-items-center profile-container">
            <form class="profile-form text-center" action="profile.php" method="POST">
                <h1 class="logo mb-3  text-uppercase">Information</h1>
                <div class="form-group">
                    <input name="username" value="<?php echo $Data['username']; ?>" type="text" class="form-control rounded-pill form-control-lg" placeholder="Username" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <input name="email" value="<?php echo $Data['email']; ?>" type="email" class="form-control rounded-pill form-control-lg" placeholder="Email Address" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <input name="firstname" value="<?php echo $Data['firstname']; ?>" type="text" class="form-control rounded-pill form-control-lg" placeholder="Firstname" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <input name="lastname" value="<?php echo $Data['lastname']; ?>" type="text" class="form-control rounded-pill form-control-lg" placeholder="Lastname" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control rounded-pill form-control-lg" placeholder="Password" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <input name="phone" value="<?php echo $Data['phone']; ?>" type="tel" class="form-control rounded-pill form-control-lg" placeholder="Phone number" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <input name="city" value="<?php echo $Data['city']; ?>" type="text" class="form-control rounded-pill form-control-lg" placeholder="City" autocomplete="off" required>
                </div>
                <button type="submit" class="btn btn-warning mt-3 rounded-pill btn-lg btn-block">Update</button>
            </form>
        </div>
    </main>


    <!-- Bootstrap scripts Ver 4.5 -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>