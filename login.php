<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login</title>
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
            <strong>Login form</strong>
          </h5>

          <!--Card content-->
          <div class="card-body px-lg-5 pt-0">
            <!-- Form -->
            <form
              id="loginForm"
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
                  id="usernameOrEmail"
                  class="form-control"
                  name="usernameOrEmail"
                />
                <label for="usernameOrEmail">Username / Email</label>
              </div>

              <!-- Password -->
              <div class="md-form">
                <input
                  type="password"
                  id="pass"
                  class="form-control"
                  name="pass"
                />
                <label for="pass">Password</label>
              </div>

              <div class="d-flex justify-content-around">
                <div>
                  <div
                    class="g-recaptcha"
                    data-sitekey="6Lelp6UUAAAAAJKRo4Xp-Ye4CSl1GpjzRBjw3tGX"
                  ></div>
                </div>
              </div>
              <br />

              <div class="d-flex justify-content-around">
                <div>
                  <!-- Remember me -->
                  <div class="custom-control custom-checkbox">
                    <input
                      type="checkbox"
                      class="custom-control-input"
                      id="defaultLoginFormRemember"
                    />
                    <label
                      class="custom-control-label"
                      for="defaultLoginFormRemember"
                      >Remember me</label
                    >
                  </div>
                </div>
                <div>
                  <!-- Forgot password -->
                  <a href="forgot-password.php">Forgot password?</a>
                </div>
              </div>

              <!-- Sign in button -->
              <button
                class="btn btn-outline-info btn-rounded my-4 waves-effect"
                type="submit"
              >
                Log in
              </button>

              <!-- Register -->
              <p>
                Not a member?
                <a href="index.php">Register</a>
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
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <script>
    $(document).ready(function() {
      $("#loginForm").submit(function(event) {
        event.preventDefault();

        var request = $.ajax({
          url: "rest/login",
          type: "POST",
          data: $(this).serialize(),
          cache: false,
          dataType: "json"
        });
        request.done(function(msg) {
          if (msg.status == "emptyUser") {
            toastr.error("Username or Email is required.");
          } else if (msg.status == "notExists") {
            toastr.error(
              "Username or Email is not correct, or user does not exists."
            );
          } else if (msg.status == "emptyPass") {
            toastr.error("Password is required.");
          } else if (msg.status == "notMatch") {
            toastr.error("Password is not correct.");
          } else if (msg.status == "captcha") {
            toastr.error(
              "Robot verification is required to logged into the system. Please click on the reCaptcha box."
            );
          } else {
            toastr.success("Credentials are correct.");
            $(
              'input[type="text"], input[type="email"], input[type="password"]'
            ).val("");
            setTimeout(function() {
              location.href = "./authentication/home.php";
            }, 1500);
          }
        });
      });
    });
  </script>
</html>
