  <style>
  .form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }
  .signup_form{
    width: 330;
    
  }
  .container{
    position: relative;
    left: 25%;
    
    
  }



  .form-control:focus {
    color: #212529;
    background-color: #fff;
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
  }

  .input-group-append {
    display: flex;
    align-items: center;
  }

  #password-strength {
    display: inline-block;
    margin-top: 1px;
    padding: 1px;
    color: black;
    border-radius: 5px;
    text-align: center;
    font-weight: bold;
  }

  #password-strength.weak {
    background-color: #dc3545;
  }

  #password-strength.medium {
    background-color: #ffc107;
  }

  #password-strength.strong {
    background-color: #28a745;
  }

  /* Label Styles */

  .label_txt {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 10px;
    display: block;
  }

  #showPassword {
    position: absolute;
    transform: translate(950%, -130%);
    cursor: pointer;


  }

  #name {
    height: 25px;
    outline: none;
    border-radius: 5px;
    width: 280px;
    transition: all 0.4s;
    font-size: 15px;

  }

  #lname {
    height: 25px;
    outline: none;
    border-radius: 5px;
    width: 280px;
    transition: all 0.4s;
    font-size: 15px;

  }

  #user {
    height: 25px;
    outline: none;
    border-radius: 5px;
    width: 280px;
    transition: all 0.4s;
    font-size: 15px;

  }

  #email {
    height: 25px;
    outline: none;
    border-radius: 5px;
    width: 280px;
    transition: all 0.4s;
    font-size: 15px;

  }

  #cpass {
    position: relative;
    height: 25px;
    outline: none;
    border-radius: 5px;
    width: 280px;
    transition: all 0.4s;
    font-size: 15px;

  }

  #password {
    position: relative;
    height: 25px;
    outline: none;
    border-radius: 5px;
    width: 280px;
    transition: all 0.4s;
    font-size: 15px;

  }

  .g-captch {
    position: absolute;
  }
</style>
<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html>

<head>
  <title> REGISTER - REGISTER</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
  <div class="final">
    <div class="row">
      <div class="col-sm-4">
      </div>
      <div class="col-sm-4">
        <img src="register.png" height="150px" width="150px" alt="REGISTER" class="logo img-fluid">
      </div>
      <div class="col-sm-4">
      </div>
    </div>
  </div>
  <div class="container">
    <?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';
    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    if (isset($_POST['signup'])) {
      extract($_POST);
      if (strlen($fname) < 3) { // Minimum 
        $error[] = 'Please enter First Name using 3 charaters atleast.';
      }
      if (strlen($fname) > 20) {  // Max 
        $error[] = 'First Name: Max length 20 Characters Not allowed';
      }
      if (!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $fname)) {
        $error[] = 'Invalid Entry First Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
      }
      if (strlen($lname) < 3) { // Minimum 
        $error[] = 'Please enter Last Name using 3 charaters atleast.';
      }
      if (strlen($lname) > 20) {  // Max 
        $error[] = 'Last Name: Max length 20 Characters Not allowed';
      }
      if (!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $lname)) {
        $error[] = 'Invalid Entry Last Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
      }
      if (strlen($username) < 3) { // Change Minimum Lenghth   
        $error[] = 'Please enter Username using 3 charaters atleast.';
      }
      if (strlen($username) > 50) { // Change Max Length 
        $error[] = 'Username : Max length 50 Characters Not allowed';
      }
      if (!preg_match("/^^[^0-9][a-z0-9]+([_-]?[a-z0-9])*$/", $username)) {
        $error[] = 'Invalid Entry for Username. Enter lowercase letters without any space and No number at the start- Eg - myusername, okuniqueuser or myusername123';
      }
      if (strlen($email) > 50) {  // Max 
        $error[] = 'Email: Max length 50 Characters Not allowed';
      }
      if ($passwordConfirm == '') {
        $error[] = 'Please confirm the password.';
      }
      if ($password != $passwordConfirm) {
        $error[] = 'Passwords do not match.';
      }
      if (strlen($password) < 7) { // min 
        $error[] = 'The password must be 8 characters long
        Password must have atleast 1 Special Character letter
        password must contain numeric value and capital letter';
      }

      if (strlen($password) > 20) { // Max 
        $error[] = 'Password: Max length 20 Characters Not allowed';
      }
      if (!preg_match('/^(?=.*[\~?!@#\$%\^&\*])(?=.{8,})/', $password)) {
        $errors[]= "Password must have atleast 1 Special Character letter";
    }
      try {
        //Enable verbose debug output
        $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;
        //Send using SMTP
        $mail->isSMTP();

        //Set the SMTP server to send through
        $mail->Host = 'smtp.gmail.com';

        //Enable SMTP authentication
        $mail->SMTPAuth = true;

        //SMTP username
        $mail->Username = 'saachin.paatel1234@gmail.com';

        //SMTP password
        $mail->Password = 'gkajpclthcaihlhd';

        //Enable TLS encryption;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('your_email@gmail.com', 'your_website_name');

        //Add a recipient
        $mail->addAddress($email, $fname);

        //Set email format to HTML
        $mail->isHTML(true);

        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $mail->Subject = 'Email verification';
        $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

        $mail->send();
        // echo 'Message has been sent';
        require_once "config.php";
        $sql = "select * from user where (username='$username' or email='$email');";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
          $row = mysqli_fetch_assoc($res);
          if ($username == $row['username']) {
            $error[] = 'Username alredy Exists.';
          }
          if ($email == $row['email']) {
            $error[] = 'Email alredy Exists.';
          }
        }

        if (!isset($error)) {
          $date = date('Y-m-d');
          $options = array("cost" => 4);
          $passwordhash = password_hash($password, PASSWORD_BCRYPT, $options);

          $sql = "INSERT INTO user (fname, lname, username, email,verification_code, password, email_verified_at) VALUES ('$fname', '$lname', '$username', '$email', $verification_code, '$passwordhash', Null)";
          $result = mysqli_query($conn, $sql);

          // $result = mysqli_query($dbc,"INSERT INTO users (fname,lname,username,email,password,date,verification_code, Password, email_verified_at) VALUES ('$fname', '$lname', '$username', '$email', '$password','$date', $verification_code, '$passwordhash', Null)");
          // $sql = 
          //$result = mysqli_query($conn, $sql);
          header("Location: email-verification.php?email=" . $email);
          exit();
          if ($result) {
            $done = 2;
          } else {
            $error[] = 'Failed : Something went wrong';
          }
        }
      } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
    }
    ?>

    <div class="col-sm-4">

      <?php
      if (isset($error)) {
        foreach ($error as $error) {
          echo '<p class="errmsg">&#x26A0;' . $error . ' </p>';
        }
      }
      ?>
    </div>
    <div class="col-sm-4">
      <?php if (isset($done)) { ?>
        <div class="successmsg"><span style="font-size:100px;">&#9989;</span> <br> You have registered successfully . <br> <a href="login.php" style="color:#fff;">Login here... </a> </div>
      <?php } else { ?>
        <div class="signup_form" >
          <div class="main">
            <form action="" method="POST" onsubmit="return validate()">
              <div class="form-group1">

                <label class="label_txt">First Name</label>
                <input type="text" id=name class="form-control" name="fname" value="<?php if (isset($error)) {
                                                                                      echo $_POST['fname'];
                                                                                    } ?>" required="">
              </div>
              <div class="form-group2">
                <label class="label_txt">Last Name </label>
                <input type="text" id="lname" class="form-control" name="lname" value="<?php if (isset($error)) {
                                                                                          echo $_POST['lname'];
                                                                                        } ?>" required="">
              </div>

              <div class="form-group3">
                <label class="label_txt">Username </label>
                <input type="text" class="form-control" name="username" id="user" value="<?php if (isset($error)) {
                                                                                            echo $_POST['username'];
                                                                                          } ?>" required="">
              </div>

              <div class="form-group4">
                <label class="label_txt">Email </label>
                <input type="email" id="email" class="form-control" name="email" value="<?php if (isset($error)) {
                                                                                          echo $_POST['email'];
                                                                                        } ?>" required="">
              </div>

              <div class="form-group">
                <label class="label_txt">Password </label>
                <input type="password" id='password' name="password" class="form-control" required="" id="password" onkeyup="checkPasswordStrength(this.value)">
                <i class="btn btn-outline-secondary bi bi-eye" id="showPassword"></i>
                <div id="password-strength"></div>
              </div>
          </div>

          <div class="form-group">
            <label class="label_txt">Confirm Password</label>
            <input type="password" name="passwordConfirm" id="cpass" class="form-control" required="" id="confirm_password">
          </div>

        </div class="form-group6">

        <div class="g-recaptcha" data-sitekey="6LewiC4lAAAAAGVop6stCT4nG9A92y42U-CySLdm"></div>
        </br>
        <button type="submit" name="signup" class="btn btn-primary btn-group-lg form_btn">Register</button>
        <p style="color:black">Have an account? <a href="login.php">Log in</a> </p>
        </form>
      <?php } ?>
    </div>
  </div>
  <div class="col-sm-4">
  </div>
  </div>
  </div>
  </div>
  <script>
    const passwordInput = document.getElementById("password");
    const cpassInput = document.getElementById("cpass");
    const toggleButton = document.getElementById("showPassword");

    toggleButton.addEventListener("click", function() {
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
      } else {
        passwordInput.type = "password";
      }
      if (cpassInput.type === "password") {
        cpassInput.type = "text";
      } else {
        cpassInput.type = "password";
      }
    });
  </script>


  <script>
    form = document.getElementById("form")

    form.addEventListener("submit", function() {

      if (!validate()) {
        event.preventDefault();
      }

    });

    function validate() {
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
  <script>
    function checkPasswordStrength(password) {
      var passwordStrength = document.getElementById("password-strength");
      var strength = "";

      if (password.length < 8) {
        strength = "Weak";
      } else if (password.length < 12) {
        strength = "Moderate";
      } else {
        strength = "Strong";
      }

      passwordStrength.innerHTML = "Password Strength: " + strength;
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>