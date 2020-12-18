<?php

    if($_SERVER['REQUEST_METHOD']=='POST') {

        require 'connect.php';

        $Data = array(
            'username' =>  $_POST['username'],
            'password'  =>  $_POST['password']
        );
			
		$login = "SELECT * FROM Users,UsersContactDetails,LoginCredentials WHERE Users.ID = UsersContactDetails.ID AND  Users.ID = LoginCredentials.ID AND UsersContactDetails.EMAIL = '$Data[username]'";

        $response = mysqli_query($conn, $login);
            
            if (mysqli_num_rows($response) === 1 ) {
                    
                $row = mysqli_fetch_assoc($response);

                if ( password_verify( $Data['password'] , $row['PASSWD']) ) {

                    $result['firstname'] = $row['FirstName'];

                    echo "Καλησπέρα ";
                    echo $result['firstname'];
                        
                    //echo json_encode($result);

                    mysqli_close($conn);

                    } else {

                        echo "Credentials wrong or account does not exist!";

                        mysqli_close($conn);
                        
                    }
                        
                } else {

                    echo "Credentials wrong or account does not exist!";

                    mysqli_close($conn);

                }
  
    }

?>