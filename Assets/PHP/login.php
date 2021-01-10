<?php

        if($_SERVER['REQUEST_METHOD']=='POST') {
			
			mysqli_set_charset($conn, "utf8");

            require 'connect.php';

            $Data = array(
                'email' =>  $_POST['email'],
                'password'  =>  $_POST['password'],
                'remember'  =>  $_POST['i-remember']
            );
            
			$login = "SELECT * FROM Users,UsersContactDetails,LoginCredentials WHERE Users.ID = UsersContactDetails.ID AND Users.ID = LoginCredentials.ID AND UsersContactDetails.EMAIL = '$Data[email]'";

            $response = mysqli_query($conn, $login);
            
                if (mysqli_num_rows($response) === 1 ) {
                    
                    $row = mysqli_fetch_assoc($response);

                    if ( password_verify( $Data['password'] , $row['PASSWD']) ) {
						
						$email = $row['EMAIL'];
						
                        if ($_POST['i-remember'] === "on") {

                            session_start();

                            $_SESSION['RememberMe'] = $email;
							
							header("Location: redirect.php");

                        }
					
						mysqli_close($conn);
						
						session_start();

                        $_SESSION['Email'] = $email;
						
						header("Location: main.php");
						
                        echo json_encode($result);

                    } else {

                        header("Location: ../../index.php?login=no");
                        
                    }
                        
                } else {

                   header("Location: ../../index.php?login=no");
                }
  
        }

?>