<html>
    <head>
        <h1>Create new Password</h1>
    </head>
    <body>
        <?php
            $selector = $_GET["selector"];
            $validator = $_GET["validator"];

            if (empty($selector) || empty($validator)) {
                echo "could not validate your request";
            } else {
                if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                ?>
                    <form action="updatePwd.php" method="POST">
                        <input type="hidden" name="selector" value="<?php  echo $selector;?>"></input>
                        <input type="hidden" name="validator" value="<?php  echo $validator;?>"></input>
                        <input type="password" name="password" placeholder="insert your password"></input>
                        <input type="password" name="passwordrepeat" placeholder="repeat password"></input>
                        <button type="submit" name="submit">send it</button>
                    </form>
                <?php
                }
            }
        ?>
        
    </body>
</html>

<?php

    if (isset($_GET["reset"])) {
        if ($_GET["reset"]=="success") {
            echo '<p class="signupsuccess">Check you email!</p>';
        }
    }

?>

