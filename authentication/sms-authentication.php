<?php
    session_start();

    require_once "../vendor/autoload.php";

    $phone = $_SESSION['phone'];

    $client = new Nexmo\Client(new Nexmo\Client\Credentials\Basic('b4992586', 'lks3RzZJ5vyvos6q'));
    
    try {
        $message = $client->message()->send([
            'to' => $phone,
            'from' => 'Nexmo',
            'text' => 'Ljubi mino bebu svoju!'
        ]);

        $response = $message->getResponseData();
        
        if($response['messages'][0]['status'] == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $response['messages'][0]['status'] . "\n";
        }
    } catch (Exception $e) {
        echo "The message was not sent. Error: " . $e->getMessage() . "\n";
    }

    if (!isset($_SESSION['luser'])) {
        header('Location: ../login.php');
    } else {
        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "Your session has expired! <a href='../login.php'>Login here</a>";
        }
        else {
?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>SMS Authentication</title>
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
            <style>
            .card {
                position: absolute;
                left: 50%;
                top: 50%;
                -webkit-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
            }
            @media only screen and (max-width: 600px) {
                .card {
                width: 90% !important;
                }
            }
            </style>
        </head>
        <body>
        <div class="container">
            <div class="row">
                <!-- Material form login -->
                <div class="card" style="width: 35%">
                <h5 class="card-header info-color white-text text-center py-4">
                    <strong>SMS Authentication</strong>
                </h5>

                <!--Card content-->
                <div class="card-body px-lg-5 pt-4">
                    <div class="text-center mb-3">
                    <p>
                        Enter the verification code sent on your mobile phone.
                    </p>
                    </div>

                    <!-- Form -->
                    <form
                    id="smsAuthForm"
                    autocomplete="off"
                    method="post"
                    action=""
                    class="text-center"
                    style="color: #757575;"
                    >
                    <!-- Email -->
                    <div class="md-form">
                        <input
                        type="text"
                        id="code"
                        class="form-control"
                        name="code"
                        />
                        <label for="code">Enter Code</label>
                    </div>

                    <!-- Sign in button -->
                    <button
                        class="btn btn-outline-info btn-rounded my-4 waves-effect"
                        type="submit"
                        name="submit"
                    >
                        Submit
                    </button>

                    <!-- Register -->
                    <p>
                        <a href="home.php">Choose different authentication</a>
                    </p>
                    </form>
                    <!-- Form -->
                </div>
                </div>
                <!-- Material form login -->
            </div>
            </div>
        </body>
        <!-- JQuery -->
        <script
            type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"
        ></script>
        <!-- Bootstrap tooltips -->
        <script
            type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"
        ></script>
        <!-- Bootstrap core JavaScript -->
        <script
            type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"
        ></script>
        <!-- MDB core JavaScript -->
        <script
            type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/js/mdb.min.js"
        ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $(document).ready(function() {
            $("#smsAuthForm").submit(function(event) {
                event.preventDefault();

                var request = $.ajax({
                url: "../rest/smsAuth",
                type: "POST",
                data: $(this).serialize(),
                cache: false,
                dataType: "json"
                });
                request.done(function(msg) {
                if(msg.status == "codeLength"){
                    toastr.error("Enter the six-digit code.");
                } else if(msg.status == "notMatch"){
                    toastr.error("Code is not correct.");
                } else {
                    toastr.success(
                    "Logged in."
                    );
                    $('input[type="text"]').val("");
                    setTimeout(function() {
                        location.href = "../home.php";
                    }, 1500);
                }
                });
            });
            });
        </script>
        </html>
        <?php
        }
    }
?>