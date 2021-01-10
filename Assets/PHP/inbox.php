<?php


?>

<!DOCTYPE html>
<html>

<head>
    <!-- Compatibility -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Font Awsome 5.15.1 -->
    <script src="https://kit.fontawesome.com/8632620e61.js" crossorigin="anonymous"></script>
    <!-- My Css -->
    <link rel="stylesheet" href="../CSS/inbox.css">
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
                    <a id="homepage" class="nav-link fas fa-inbox mt-1 active" href="inbox.php">Inbox</a>
                </li>
                <li class="nav-item">
                    <a id="user-profile" class="nav-link fas fa-user mt-1" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a id="user-profile" class="nav-link log fas fa-sign-out-alt mt-1" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END Navigation Bar -->

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 mt-2 left-side">
                <ul class="list-unstyled">
                    <!-- BEGIN Person DM'ed -->

                    <?php 
								
								
        						require 'connect.php';

        						mysqli_set_charset($conn, "utf8");
							
								session_start();
								
								$email = $_SESSION['Email'];

                                $sql = "SELECT FirstName,LastName,Message,DateSent FROM Users,Messages WHERE Users.ID = Messages.FromUser AND Messages.ToUser = (SELECT Users.ID FROM Users,UsersContactDetails WHERE Users.ID = UsersContactDetails.ID AND UsersContactDetails.EMAIL = '$email') ORDER BY DateSent DESC ";

                                $result = mysqli_query($conn,$sql);
							
								 if(mysqli_num_rows($result) > 0){

                                    while($row = mysqli_fetch_assoc($result)){

                            ?>
                                <li class="border-color p-2 mt-2">
                                    <a href="#" class="d-flex test justify-content-between">
                                        <div class="text-small">
                                            <strong><?php echo $row['FirstName'] . " " . $row['LastName']; ?></strong>
                                            <p class="last-message text-muted"><?php echo $row['Message'];?></p>
                                        </div>
                                        <div class="chat-footer">
                                            <p class="text-smaller text-muted mb-0"><?php echo $row['DateSent'];?></p>
                                            <span class="text-muted float-right"><i class="fas fa-reply" aria-hidden="true"></i></span>
                                        </div>
                                    </a>
                                </li>

                            <?php 
									}
									
                                }
								if (isset($_GET["user"])) {
                					if ($_GET["user"]=="notfound") {
										?>
											<div class="alert alert-danger text-center"  role="alert">
 					 							User not found!
											</div>
										<?php
                					}
            					}

                            ?>
                            <!-- END Person DM'ed -->

                    <!-- PALI MESA STO UL KANEIS TO ENA KATO APO TO ALLO OPOS KAI PRIN  -->
                </ul>
            </div>
            <div class="col-md-7 col-sm-5">
                <!-- BEGIN Messages -->
                <div class="card border-warning mt-3">
                    <div class="card-body border-color">
                        <h5 class="card-title text-center">Message</h5>
                        <form action="send-message.php" method="POST">
                            <div class="form-group">
                                <input name="username" type="text" class="form-control rounded el-pepe" placeholder="Username" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control mt-2 el-pepe" id="message-text-area" rows="4" placeholder="Type your message here..." style="resize: none;" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-warning rounded-pill">Send</button>
                        </form>
                    </div>
                </div>
                <!-- END Messages -->
            </div>
        </div>
    </div>

    <!-- Bootstrap scripts Ver 4.5 -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html> 