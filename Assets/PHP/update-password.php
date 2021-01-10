<?php

if (isset($_POST["submit"])) {

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["password"];
    $passwordrepeat = $_POST["passwordrepeat"];

	session_start();
		
	$selectorSs = $_SESSION['selector'];
	$validatorSs = $_SESSION['validator'];
	
    if ($password != $passwordrepeat) {
       header("Location: create-new-password.php?pwdmatching=dontmatch&selector=" . $selectorSs . "&validator=" . $validatorSs);
    } else {
    
    $currentDate = date("U");

    require 'connect.php';

    $sql = "SELECT * FROM PwdReset WHERE PwdResetSelector=? AND PwdResetExpires>=?;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)) {
        ?>
			<div class="alert alert-danger text-center" role="alert">
  				Error 500
			</div>
		<?php
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
                ?>
				<div class="alert alert-danger text-center" role="alert">
  					Error 501
				</div>
			<?php
            } elseif ($tokenCheck === true) {

                $tokenEmail = $row["Email"];

                $sql = "SELECT * FROM UsersContactDetails WHERE EMAIL=?;";

                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt,$sql)) {
                    ?>
						<div class="alert alert-danger text-center" role="alert">
  							Error 502
						</div>
					<?php
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    if(!$row = mysqli_fetch_assoc($result)) {
                      ?>
						<div class="alert alert-danger text-center" role="alert">
  							Error 503
						</div>
					<?php
                    } else {
                        $sql = "UPDATE LoginCredentials SET PASSWD=? WHERE ID = (SELECT Users.ID FROM Users,UsersContactDetails WHERE Users.ID = LoginCredentials.ID AND Users.ID = UsersContactDetails.ID AND UsersContactDetails.EMAIL = ?)";

                        $stmt = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($stmt,$sql)) {
                            ?>
								<div class="alert alert-danger text-center" role="alert">
  									Error 504
								</div>
							<?php
                            exit();
                        } else {
                            $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            $deleteSQLstring = "DELETE FROM PwdReset WHERE Email = ?";

                            $stmt = mysqli_stmt_init($conn);

                            if (!mysqli_stmt_prepare($stmt,$deleteSQLstring)) {
                                ?>
									<div class="alert alert-danger text-center" role="alert">
  										Error 505
									</div>
								<?php
                                exit();
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location: ../../index.php?pwdchanged=true");                   
                            }
                        }

                    }
                }

            }
        }
		
    }
	}
} else {
    header("Location: ../../index.php");
}
