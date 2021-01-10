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
                    <form class="form-inline my-2 my-lg-0" action="" method="POST">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </li>
            </ul>
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
                    <a id="user-profile" class="nav-link fas fa-sign-out-alt mt-1" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END Navigation Bar -->

    

    
    <!-- BEGIN Messages -->
    
    <div class="col d-flex justify-content-center">
        <div class="card" style="width: 40rem;">
            <div class="card-body form-inline">
                <p class="card-text">El pepe</p>
                <a href="#" class="btn rounded-pill btn-custom ml-auto">Follow</a>
            </div>
        </div>
    </div>

    <!-- END Messages -->

    <!-- Bootstrap scripts Ver 4.5 -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>