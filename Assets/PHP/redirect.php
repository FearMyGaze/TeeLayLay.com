<?php

    session_start();

    if(isset($_SESSION['RememberMe'])) {
      header("Location: ./Assets/PHP/main.php");
    } 

?>