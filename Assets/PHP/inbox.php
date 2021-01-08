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
   
    <div class="card">
        <div class="card-body"> <!-- Grid row -->

            <div class="row px-lg-2 px-2">  <!-- Grid column -->
                

                <div class="col-md-6 col-xl-4 px-0"> <!-- Grid column -->
                    
                    <h6 class="font-weight-bold mb-3 text-center text-lg-left">Member</h6>
                    <div class="z-depth-1 px-3 pt-3 pb-0">
                        <ul class="list-unstyled">
                            <!-- BEGIN Person DM'ed -->
                            <li class="border-color p-2">
                                <a href="#" class="d-flex test justify-content-between">
                                    <div class="text-small">
                                        <strong>John Doe</strong>
                                        <p class="last-message text-muted">Hello, Are you there?</p>
                                    </div>
                                    <div class="chat-footer">
                                        <p class="text-smaller text-muted mb-0">Just now</p>
                                        <span class="text-muted float-right"><i class="fas fa-reply" aria-hidden="true"></i></span>
                                    </div>
                                </a>
                            </li>
                            <!-- END Person DM'ed -->
                        </ul>
                    </div>

                </div>
                <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0"> <!-- Grid column -->
                    <div class="chat-message">
                        <ul class="list-unstyled chat">

                            <!-- BEGIN Message block -->
                            <li class="d-flex justify-content-between mb-4">
                                <div class="p-3 ml-2 z-depth-1">
                                    <div class="header">
                                        <strong class="primary-font">Brad Pitt</strong>
                                        <small class="pull-right text-muted"><i class="far fa-clock"></i> 12 mins ago</small>
                                    </div>
                                    <hr class="w-100">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                    </p>
                                </div>
                            </li>
                            <!-- END Message block -->

                            <!-- BEGIN Send message -->
                            <li>
                                <div class="form-group">
                                    <textarea class="form-control el-pepe pl-2 my-0" id="message-text-area" rows="4" placeholder="Type your message here..." style="resize: none;" ></textarea>
                                </div>
                            </li>
                            <button type="button" class="btn btn btn-warning btn-sm btn-rounded float-right">Send</button>
                            <!-- END Send message -->
                        </ul>

                    </div>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
    </div>

    <!-- END Messages -->

    <!-- Bootstrap scripts Ver 4.5 -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>
</body>

</html>