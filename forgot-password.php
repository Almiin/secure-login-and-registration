<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Forgot Password?</title>
    <!-- Font Awesome -->
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
            <strong>Forgot your password?</strong>
          </h5>

          <!--Card content-->
          <div class="card-body px-lg-5 pt-4">
            <div class="text-center mb-3">
              <p>
                Enter your email address and we will send you instructions on
                how to reset your password.
              </p>
            </div>

            <!-- Form -->
            <form
              id="forgotForm"
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
                  id="email"
                  class="form-control"
                  name="email"
                />
                <label for="email">Enter email address</label>
              </div>

              <!-- Sign in button -->
              <button
                class="btn btn-outline-info btn-rounded my-4 waves-effect"
                type="submit"
              >
                Reset Password
              </button>

              <!-- Register -->
              <p>
                <a href="login.php">Back to Login</a>
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
      $("#forgotForm").submit(function(event) {
        event.preventDefault();

        var request = $.ajax({
          url: "./vendor/mikecao/flight/forgotPassword",
          type: "POST",
          data: $(this).serialize(),
          cache: false,
          dataType: "json"
        });
        request.done(function(msg) {
          if (msg.status == "emptyEmail") {
            toastr.error("Enter an e-mail address.");
          } else if (msg.status == "invalidEmail") {
            toastr.error("Invalid email format. <br/> E.g. 'jsmith@example.com'");
          } else if (msg.status == "notExists") {
            toastr.error("Email does not exists.");
          } else {
            toastr.success(
              "Instructions on how to reset your password are sent on your email."
            );
            $('input[type="text"]').val("");
          }
        });
      });
    });
  </script>
</html>
