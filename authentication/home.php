<?php
    session_start();

    if (!isset($_SESSION['luser'])) {
        header('Location: ../login.php');
    } else {
        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "Your session has expired! <a href='../login.php'>Login here</a>";
        }
        else { //Starting this else one [else1]
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>2 factor authentication</title>
            <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
            />
            <!-- Bootstrap core CSS -->
            <link
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"
            rel="stylesheet"
            />
            <!-- Material Design Bootstrap -->
            <link
            href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/css/mdb.min.css"
            rel="stylesheet"
            />
            <link
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
            rel="stylesheet"
            />
        </head>
        <body>
        <div class="container h-100" style="margin-top: 200px">
            <div class="row align-items-center h-100">
                <div class="col-6 mx-auto">
                    <div class="jumbotron text-center">
                        <p>Choose two factor authentication: </p>
                        <a class="btn btn-primary btn-sx" href="sms-authentication.php">SMS</a>
                        <a class="btn btn-primary btn-xs" href="generated-code.php">App-Generated Codes</a>
                    </div>
                    <div class="text-center">
                        <p>
                            <a href="../login.php">Back to Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </body>
        </html>
        <?php
        }
    }
?>