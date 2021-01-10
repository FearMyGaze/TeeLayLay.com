<?php

    if($_SERVER['REQUEST_METHOD'] =='POST' ){
    
    	require 'connect.php';
    
        mysqli_set_charset($conn, "utf8");

        session_start();

        $email = $_SESSION['Email'];
        
        $username = $_POST["username"];

        $message = $_POST["message"];

            $checkIfUsernameExists = "SELECT * FROM LoginCredentials WHERE Username = '$username'";

            $response1 = mysqli_query($conn, $checkIfUsernameExists);

            $ToUserID = "SELECT Users.ID FROM Users,LoginCredentials WHERE Users.ID = LoginCredentials.ID AND Username = '$username'";

            $response2 = mysqli_query($conn, $ToUserID);

            $FromUserID = "SELECT Users.ID FROM Users,UsersContactDetails WHERE Users.ID = UsersContactDetails.ID AND EMAIL = '$email'";

            $response3 = mysqli_query($conn, $FromUserID);

       	        if(mysqli_num_rows($response1) === 1) {

                    $rowFrom = mysqli_fetch_assoc($response3);

                    $rowTo = mysqli_fetch_assoc($response2);

                    $query = "INSERT INTO Messages(FromUser, ToUser, Message) VALUES ('$rowFrom[ID]', '$rowTo[ID]', '$message')";

                    mysqli_query($conn, $query);
					
					header("Location: inbox.php");

    	        } else {
					header("Location: inbox.php?user=notfound");
				}
    }

?>