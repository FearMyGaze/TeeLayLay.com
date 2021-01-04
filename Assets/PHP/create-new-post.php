<?php

    if($_SERVER['REQUEST_METHOD'] =='POST'){

        $content = $_POST['Content'];
		
		session_start();

        $email = $_SESSION['Email'];
		
        require 'connect.php';
        
		mysqli_set_charset($conn, "utf8");
		
		$sql = "SELECT Users.ID,Email FROM Users,UsersContactDetails WHERE Users.ID = UsersContactDetails.ID AND Email = '$email'";
		
		$result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0){
			
			$row = mysqli_fetch_assoc($result);
			
			$myID = $row['ID'];
			
			echo "$myID";
			
			$sql = "INSERT INTO Posts(Content, UserID) VALUES ('$content', '$myID')";
			
			mysqli_query($conn, $sql);
			
			header("Location: main.php");
			
		} else {
			
            echo "qifsh1a";
            mysqli_close($conn);
            
        }

		
        
       

     

    }

?>