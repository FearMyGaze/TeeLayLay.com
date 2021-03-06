<?php

if(isset($_POST["email"])) {

    $selector = bin2hex(random_bytes(8));

    $token = random_bytes(32);

    $url = "https://teelaylay.com/Assets/PHP/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;//U FORMAT EINAI GENIKO WORLDWIDE FORMAT POY XRHSIMOPOIEITAI GIA TON PROSDIORISMO THS WRAS TH STIGMH POY KALEITAI +1800 SECS PROFANWS GIA TO POTE THA LHXEI TO LINK

    require 'connect.php';

    $userEmail = $_POST["email"];

    $deleteSQLstring = "DELETE FROM PwdReset WHERE Email =?";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$deleteSQLstring)) {
		?>
			<div class="alert alert-danger text-center" role="alert">
  				Error during the deletion of previous password reset requests!
			</div>
		<?php
        echo "There was an error!1";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO PwdReset (Email, PwdResetSelector, PwdResetToken, PwdResetExpires) VALUES(?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)) {
        ?>
			<div class="alert alert-danger text-center" role="alert">
  				Error during the insertion of new password reset requests!
			</div>
		<?php
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail , $selector , $hashedToken , $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail;

    $subject = 'Επαναφέρετε τον κωδικό πρόσβασης σας εδώ!';

    $message = 'Λάβαμε αίτημα επαναφοράς κωδικού πρόσβασης από εσάς, μπορείτε να αγνοήσετε το μήνυμα ή να κάνετε click στον σύνδεσμο που ακολουθεί για να επαναφέρετε τον κωδικό σας -> ' .  $url . ' (ο οποίος έχει ισχύ 30 λεπτά).';

    $headers = "From: info@teelaylay.com" . "\r\n";

    mail($to,$subject,$message,$headers);

    header("Location: ../../index.php?reset=success");

} else {
    header("Location: ../../index.php?reset=failed");
}