
<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html>

<head><br>
  <title> Login - LOGIN</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
      </div>
      <div class="col-sm-4">
        <div class="login_form">
          <form id="form" action="login_process.php" method="POST">
            <div class="form-group">
              <img src="login logo.png" alt="LOGIN" class="logo img-fluid"> <br>
              <?php
              if (isset($_GET['loginerror'])) {
                $loginerror = $_GET['loginerror'];
              }
              if (!empty($loginerror)) {
                echo '<p class="errmsg">Invalid login credentials, Please Try Again..</p>';
              } ?>

              <label class="label_txt"><b>Username or Email </b>  </label>
              <input type="text" name="login_var" value="<?php if (!empty($loginerror)) {
                                                            echo  $loginerror;
                                                          } ?>" class="form-control" required="">
            </div>
            <div class="form-group">
              <label class="label_txt"> <b> Password </b> </label>
              <input type="password" name="password" class="form-control" required="">
            </div>
        </div class="form-group">
        <div class="g-recaptcha" data-sitekey="6LewiC4lAAAAAGVop6stCT4nG9A92y42U-CySLdm"></div>
        <div>
          <button type="submit" name="sublogin" id="login-btn" class="btn btn-primary btn-group-lg form_btn">Login</button>
        </div>
        </form>
        <p style="font-size: 12px;text-align: center;margin-top: 10px;"><a href="forgot-password.php" style="color:black;">Forgot Password?</a> </p>
        <p style="color:black">Don't have an account? <a href="register.php" style="color:blue">Register
          </a> </p>
      </div>
      <div class="col-sm-4">
      </div>
    </div>
  </div>
  </div>
</body>
<script>
  form = document.getElementById("form")

  form.addEventListener("submit", function() {
   
    if(!validate()){
      event.preventDefault();
    }
  
  });
  function validate(){
    var response = grecaptcha.getResponse();
    if (response.length == 0) {
      // reCAPTCHA is not clicked
      alert("Please verify you are not a robot");
      return false;
    } else {
      // reCAPTCHA is clicked
      // You can proceed with your form submission or other actions here
      return true;
    }
  }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>