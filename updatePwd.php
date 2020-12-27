<?php

if (isset($_POST["submit"])) {

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["password"];
    $passwordrepeat = $_POST["passwordrepeat"];

    if (empty($password) || empty($passwordrepeat)) {
        echo "kena passwords!";
    } else if ($password != $passwordrepeat) {
        echo "anisothta passwords!";
    }
    
    $currentDate = date("U");

    require 'connect.php';

    $sql = "SELECT * FROM PwdReset WHERE PwdResetSelector=? AND PwdResetExpires>=?;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "There was an error!1";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if(!$row = mysqli_fetch_assoc($result)) {
            echo "resubmit your request";
        } else {
            $tokenBin = hex2bin($validator);
			echo $tokenBin . "</br>" . $row["PwdResetToken"] . "<br>";
			
            $tokenCheck = password_verify($tokenBin,$row["PwdResetToken"]);
			echo !$tokenCheck ? 'false' : '';
            if ($tokenCheck === false) {
                echo "resubmit your request2";
            } elseif ($tokenCheck === true) {

                $tokenEmail = $row["Email"];

                $sql = "SELECT * FROM UsersContactDetails WHERE EMAIL=?;";

                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt,$sql)) {
                    echo "There was an error!2";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    if(!$row = mysqli_fetch_assoc($result)) {
                      echo "there was an error!3";
                    } else {
                        $sql = "UPDATE LoginCredentials SET PASSWD=? WHERE ID = (SELECT Users.ID FROM Users,UsersContactDetails WHERE Users.ID = LoginCredentials.ID AND Users.ID = UsersContactDetails.ID AND UsersContactDetails.EMAIL = ?)";

                        $stmt = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($stmt,$sql)) {
                            echo "There was an error!4";
                            exit();
                        } else {
                            $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            $deleteSQLstring = "DELETE FROM PwdReset WHERE Email = ?";

                            $stmt = mysqli_stmt_init($conn);

                            if (!mysqli_stmt_prepare($stmt,$deleteSQLstring)) {
                                echo "There was an error!5";
                                exit();
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location: index.php");
                                echo "o kwdikos allaxe!";
                            }
                        }

                    }
                }

            }
        }

    }

} else {
    header("index.php");
}
