<?php
    session_start();

    if (!isset($_SESSION['luser'])) {
        header('Location: login.php');
    } else {
        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "Your session has expired! <a href='login.php'>Login here</a>";
        }
        else { //Starting this else one [else1]
?>
            <!-- From here all HTML coding can be done -->
            <html>
                Welcome
                <?php
                    echo $_SESSION['luser'];
                    echo '<br />';
                    echo "<a href='logout.php'>Log out</a>";
                ?>
            </html>
<?php
        }
    }
?>