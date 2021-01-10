<?php
    
    require 'connect.php';
    
    mysqli_set_charset($conn, "utf8");
        
    session_start();

    $user1 = $_SESSION['Email'];

    $user2 = $_SESSION['uname'];
	
	$sqlMyID = "SELECT Users.ID FROM Users,UsersContactDetails WHERE Users.ID = UsersContactDetails.ID AND UsersContactDetails.EMAIL = '$user1'";

	$sqlUser2ID = "SELECT Users.ID FROM Users,LoginCredentials WHERE Users.ID = LoginCredentials.ID AND LoginCredentials.Username = '$user2'";
	
	$result1 = mysqli_query($conn,$sqlMyID);

	$result2 = mysqli_query($conn,$sqlUser2ID);

	if(mysqli_num_rows($result1) === 1){
		
		if(mysqli_num_rows($result2) === 1){

			$row1 = mysqli_fetch_assoc($result1);
			
			$row2 = mysqli_fetch_assoc($result2);

    		$query = "INSERT INTO Follows(USER1, USER2, Following) VALUES ('$row1[ID]', '$row2[ID]', 'yes')";

    		mysqli_query($conn, $query);

    		header('Location: main.php');

		} else {
			echo "sfalma kata thn euresh id tou user pou anazhteitai";
		}
	} else {
		echo "session expired please reconnect!";
	}

?>