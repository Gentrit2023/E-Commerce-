<?php 

  session_start();

include('includes/connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="Register.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <?php
    if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
        echo '<script>alert("' . $_SESSION['message'] . '");</script>';
        $_SESSION['message'] = '';
    }
    ?>
</head>
</head>


<body>

  <div class="container">
    <div class="form-box">
    <form action="class_registration.php" method="post" name="Formfill" onsubmit="return validation()">
            <h2>Register</h2>
        <p id="result"></p>
        <div class="input-box">
          <i class='bx bxs-user'></i>
          <input type="text" name="emri" placeholder="Emri">
        </div>
        <div class="input-box">
          <i class='bx bxs-envelope'></i>
          <input type="email" name="email" placeholder="Email">
        </div>
        <div class="input-box">
          <i class='bx bxs-lock-alt'></i>
          <input type="password" name="password" placeholder="Password">
        </div>
        <div class="input-box">
          <i class='bx bxs-lock-alt'></i>
          <input type="password" name="passwordperserite" placeholder="Konfirmo Password">
        </div>
        <div class="button">
        <button type="submit" name="register_btn" class="btn">Register</button>
        </div>
        <div class="group">
          <span><a href="index.php">Home</a></span>
          <span><a href="Login.php">Login </a></span>
        </div>
      </form>
    </div>
    <div class="popup" id="popup">
      <ion-icon name="checkmark-circle-outline"></ion-icon>
      <h2>Thank You!</h2>
      <p>You were Registration Sucessfully. Thanks!</p>
      <a href="Login.php"><button onclick="CloseSlide()">OK</button></a>
    </div>
  </div>
  <script src="Register.js"></script>
</body>

</html>