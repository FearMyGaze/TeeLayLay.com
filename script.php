<?php

if(isset($_POST["email"])) {

    $selector = bin2hex(random_bytes(8));

    $token = random_bytes(32);

    $url = "teelaylay.com/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);


    $expires = date("U") + 1800;//U FORMAT EINAI GENIKO WORLDWIDE FORMAT POY XRHSIMOPOIEITAI GIA TON PROSDIORISMO THS WRAS TH STIGMH POY KALEITAI +1800 SECS PROFANWS GIA TO POTE THA LHXEI TO LINK

    require 'connect.php';

    $userEmail = $_POST["email"];

    $deleteSQLstring = "DELETE FROM PwdReset WHERE Email =?";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$deleteSQLstring)) {
        echo "There was an error!1";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO PwdReset (Email, PwdResetSelector, PwdResetToken, PwdResetExpires) VALUES(?,?,?,?);";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "There was an error!2";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail , $selector , $hashedToken , $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail;

    $subject = 'kane reset ton kwdiko s';

    $message = 'lavame request anakthshs kwdikou opote kane click sto link an ontws pathses kati tetoio diaforetika to link tha lhxei se mish wra ' .  $url;

    $headers = "From: info@teelaylay.com" . "\r\n";

    mail($to,$subject,$message,$headers);

    header("Location: resetpassword.php?reset=success");
    

} else {
    header("Location: index.php");
}