<?php

    if($_SERVER['REQUEST_METHOD'] =='POST' ){
    
    	require 'connect.php';
    
    	mysqli_set_charset($conn, "utf8");

        if ($_POST["password"] === $_POST["conf_password"]) {

            $Data = array(
                'firstname'     =>  $_POST["firstname"],
                'lastname'      =>  $_POST["lastname"],
                'email'         =>  $_POST["email"],
				'username'      =>  $_POST["username"],
                'password'      =>  password_hash($_POST["password"], PASSWORD_DEFAULT),
                'sex'           =>  $_POST["sex"],
                'birthday'      =>  $_POST["birthday"],
                'city'          =>  $_POST["city"],
                'phone'         =>  $_POST["phone"]
            );

            $checkForDublicateEmails = "SELECT * FROM UsersContactDetails WHERE EMAIL = '$Data[email]'";

			$checkForDublicateUsernames = "SELECT * FROM LoginCredentials WHERE Username = '$Data[username]'";
			
            $response = mysqli_query($conn, $checkForDublicateEmails);
			
			$response1 = mysqli_query($conn, $checkForDublicateUsernames);
			
			if(mysqli_num_rows($response1) === 1) {

                    echo "This username belongs to another user.";
				
				} else {
				
       	        if(mysqli_num_rows($response) === 1) {

                    echo "This email address belongs to another user.";

    	        } else {

                    $query = "INSERT INTO Users(FirstName, LastName, Gender, BirthDay) VALUES ('$Data[firstname]', '$Data[lastname]', '$Data[sex]', '$Data[birthday]')";

                    mysqli_query($conn, $query);

                    $lastID = mysqli_insert_id($conn);

                    $query = "INSERT INTO UsersContactDetails(EMAIL, City, Phone, ID) VALUES ('$Data[email]', '$Data[city]', '$Data[phone]', '$lastID')";

                    mysqli_query($conn, $query);

                    $query = "INSERT INTO LoginCredentials(ID, PASSWD, Username) VALUES ('$lastID', '$Data[password]', '$Data[username]')";

                    mysqli_query($conn, $query);
					
					header("Location: ../../index.php");

                }
			
			}
		
		} else {
            echo "PASSWORD FIELDS DON'T MATCH!";
        }
            
    }

?>