<html>
    <head>
        <h1>Reset Password</h1>
    </head>
    <body>
        <form action="script.php" method="POST">
            <input type="text" name="email" placeholder="insert your email"></input>
            <button type="submit">send it</button>
        </form>
    </body>
</html>

<?php

    if (isset($_GET["reset"])) {
        if ($_GET["reset"]=="success") {
            echo '<p class="signupsuccess">Check you email!</p>';
        }
    }

?>