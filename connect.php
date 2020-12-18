<?php

    $ServerDomain= "linuxzone153.grserver.gr";
    $Username = "loliakos077669_Shatter";
    $DBUserPassword = "W6tYl2hf2uvg2Px2uG9o5oHixtLmjuoyYFQqIHA0FSEEBywfZSq3gtgp1Bd9o96Pg84Ka1WbC8uJJVRUtoOKXP1CY2GaOtgGvur";
    $DatabaseName = "loliakos077669_Shatty";

    $conn = mysqli_connect($ServerDomain, $Username, $DBUserPassword, $DatabaseName);
	

        if(!$conn){
			echo "Failed Connection!";
        }

?>