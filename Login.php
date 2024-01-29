<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include('includes/connect.php');



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login In</title>
  <link rel="stylesheet" href="Register.css">
 
</head>
<?php
    if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
        echo '<script>alert("' . $_SESSION['message'] . '");</script>';
        $_SESSION['message'] = '';
    }
    ?>
<body style="background:url(back.jpg) no-repeat;">

  <div class="container">
    <div class="form-box">
    <form action="class_registration.php" method="post" name="Formfill" onsubmit="return validation()">
        <h2>Login In</h2>
        <p id="result"></p>

        <div class="input-box">
          <i class='bx bxs-envelope'></i>
          <input type="email" name="Email" placeholder="Email">
        </div>
        <div class="input-box">
          <i class='bx bxs-lock-alt'></i>
          <input type="password" name="Password" placeholder="Password">
        </div>

        <div class="button">
          <input type="submit" name="login_btn" class="btn" onclick="validation()" value="Login">
        </div>
        <div class="group">
          <span><a href="index.php">Home</a></span>
          <span><a href="Register.php">Register </a></span>
        </div>
      </form>
    </div>
    <div class="popup" id="popup">
      <ion-icon name="checkmark-circle-outline"></ion-icon>
      <h2>Thank You!</h2>
      <p>You were Registration Sucessfully. Thanks!</p>
      <a name="login_btn" href="Login.php"><button onclick="CloseSlide()">OK</button></a>
    </div>
  </div>

  <script src="Register.js">
    function validation() {
      let usernamePattern = /^[a-zA-Z0-9]{6,20}$/;
      let emailPattern = /^[a-zA-Z.-_]+@+[a-z]+\.+[a-z]{2,3}$/;
      let passwordPattern = /^[a-zA-Z@#$%^&*]{6,20}$/;

    }
  </script>
</body>

</html>