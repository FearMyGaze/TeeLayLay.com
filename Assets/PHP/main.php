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
        <link rel="stylesheet" href="../CSS/MainStyle.css">
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
                        <a id="homepage" class="nav-link fas fa-home mt-1 active" href="main.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a id="homepage" class="nav-link fas fa-inbox mt-1" href="inbox.php">Inbox</a>
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

        <!-- BEGIN New post creation -->
        <div class="new-post-area">
            <div class="col d-flex justify-content-center">
                <div class="card mt-3" style="width: 40rem;">
                    <div class="border rounded">
                        <div class="card-header text-center"><h3>Update your status</h3></div>
                        <div class="card-body">
                            <form class="" action="create-new-post.php" method="POST">
                                <div class="form-group">
                                    <textarea name="Content" class="el-pepe form-control" cols="75" rows="2" maxlength="150" required style="resize: none;"></textarea>
                                </div>
                                <button class="btn btn-warning mt-3 rounded-pill" type="submit">Post</button>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <!-- END New post creation -->
        <?php

        require 'connect.php';

        mysqli_set_charset($conn, "utf8");

        $sql= "SELECT FirstName,LastName,Content,UserID,CreationDate FROM Posts,Users WHERE Users.ID = Posts.UserID ORDER BY CreationDate DESC";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_assoc($result)){

        ?>

        <!-- BEGIN Posts -->
        <div class="post-area">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4 " style="width: 40rem;">
                    <div class="border rounded">
                        <div id="username" class="card-header"><?php echo $row['FirstName'] . " " . $row['LastName']; ?></div>
                        <div class="card-body">
                            <p class="card-text"><?php echo  $row['Content']; ?></p>
                        </div>
                        <div id="post-created" class="card-footer text-muted"><?php echo $row['CreationDate']; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Posts-->
            
            <?php
			}
                

            } else {
            
                echo "qifhsa";
            
            }

            mysqli_close($conn);

   ?>
		
		
        <!-- Bootstrap scripts Ver 4.5 -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>

</html>