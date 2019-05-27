<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Register</title>
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
      .error-message {
        padding: 7px 10px;
        background: #fff1f2;
        border: #ffd5da 1px solid;
        color: #d6001c;
        border-radius: 4px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <!-- Material form register -->
        <div class="card" style="width: 40%">
          <h5 class="card-header info-color white-text text-center py-4">
            <strong>Registration form</strong>
          </h5>

          <!--Card content-->
          <div class="card-body px-lg-5 pt-0">
            <!-- Form -->
            <form
              id="registerForm"
              method="post"
              autocomplete="off"
              class="text-center"
              action=""
              style="color: #757575;"
            >
              <div class="form-row">
                <div class="col">
                  <!-- Name -->
                  <div class="md-form">
                    <input
                      type="text"
                      id="name"
                      class="form-control"
                      name="name"
                    />
                    <label for="name">Name</label>
                  </div>
                </div>
                <div class="col">
                  <!-- Username -->
                  <div class="md-form">
                    <input
                      type="text"
                      id="username"
                      class="form-control"
                      name="username"
                    />
                    <label for="username">Username</label>
                  </div>
                </div>
              </div>

              <!-- E-mail -->
              <div class="md-form mt-0">
                <input
                  type="text"
                  id="email"
                  class="form-control"
                  name="email"
                  data-toggle="tooltip"
                  data-placement="right"
                  title="Example: 'jsmith@example.com'"
                />
                <label for="email">Email</label>
              </div>

              <!-- Phone number -->
              <div class="md-form">
                <input
                  type="text"
                  id="phone"
                  class="form-control"
                  name="phone"
                  data-toggle="tooltip"
                  data-placement="right"
                  title="Example: '062/111-222'"
                  aria-describedby="materialRegisterFormPhoneHelpBlock"
                />
                <label for="phone">Phone number</label>
              </div>

              <div class="form-row">
                <div class="col">
                  <!-- Password -->
                  <div class="md-form">
                    <input
                      type="password"
                      id="pass"
                      class="form-control"
                      name="pass"
                      aria-describedby="materialRegisterFormPasswordHelpBlock"
                    />
                    <label for="pass">Password</label>
                  </div>
                </div>
                <div class="col">
                  <!-- Repeat password -->
                  <div class="md-form">
                    <input
                      type="password"
                      id="rpass"
                      class="form-control"
                      name="rpass"
                    />
                    <label for="rpass">Repeat password</label>
                  </div>
                </div>
              </div>

              <!-- Sign up button -->
              <button
                class="btn btn-outline-info btn-rounded my-4 waves-effect"
                type="submit"
              >
                Register
              </button>

              <p>
                Already have an account?
                <a href="login.php">Log in</a>
              </p>
            </form>

            <!-- Form -->
          </div>
        </div>
        <!-- Material form register -->
      </div>
    </div>
  </body>
  <!-- JQuery -->
  <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"
  ></script>
  <!-- Bootstrap tooltips -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/js/mdb.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#registerForm").submit(function(event) {
        event.preventDefault();

        var request = $.ajax({
          url: "rest/register",
          type: "POST",
          data: $(this).serialize(),
          cache: false,
          dataType: "json"
        });
        request.done(function(msg) {
          if (msg.status == "empty") {
            toastr.error("All fields are required.");
          } else if (msg.status == "usernameErr") {
            toastr.error("Special characters are not allowed for username.");
          } else if (msg.status == "usernameExists") {
            toastr.error("Username already exists.");
          } else if (msg.status == "invalidEmail") {
            toastr.error("Invalid email format.");
          } else if (msg.status == "emailExists") {
            toastr.error("Email already exists.");
          } else if (msg.status == "passwordErr") {
            toastr.error(
              "Password must contain at least 6 characters, one capital, one special character and one number."
            );
          } else if (msg.status == "notSame") {
            toastr.error("Passwords must be same.");
          } else {
            toastr.success("Registration is complete");
            $(
              'input[type="text"], input[type="email"], input[type="password"]'
            ).val("");
            setTimeout(function() {
              location.href = "login.php";
            }, 1500);
          }
        });
      });

      $(function() {
        $('[data-toggle="tooltip"]').tooltip();
      });
    });
  </script>
</html>
