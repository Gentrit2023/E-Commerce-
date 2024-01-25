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
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

  <title>Online Store</title>
  <?php
    if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
        echo '<script>alert("' . $_SESSION['message'] . '");</script>';
        $_SESSION['message'] = '';
    }
    ?>
</head>

<body style="background-color: #051622;">

  <header>

    <img class="logo" src="logo1.png" alt="logo" width="100px" padding 10px>
    <!--Pjesa e butonit per me ba responsive qe esht perdor check butoni-->
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <!--END-->
      <ul class="nav_list">
        <li><a href="index.php">Home</a></li>
        <li><a href="Men.php">Men</a></li>
        <li><a href="Woman.php">Woman</a></li>
        <li><a href="AboutUs.php">About Us</a></li>
        <li><a href="Contact.php">Contact</a></li>
      </ul>
    </nav>
    <?php 
            if(isset($_SESSION['auth'])) 
            {   
        ?>
       
         <ul>
         <a class="btn" href="logout.php"><button>Log Out</button></a>
         </ul>
        
        <?php 
            }
            else {
                ?>
                <a class="btn" href="Login.php"><button>Log In</button></a>
            
             <?php 
            }
            ?>
    
    <div class="btnCart">
       <a class="fa fa-shopping-cart" href="shtoNeShporte.php ">My Cart</a>
    </div>
  </header>

  <hr>


  <div class="content-Slide">
    <div class="box">

      <img class="mySlides" src="NikeS1.jpg" style="width:100%">
      <img class="mySlides" src="NikeS2.jpg" style="width:100%">
      <img class="mySlides" src="NikeS3.jpg" style="width:100%">
    </div>
    <a class="btnS" href="Men.php"> <button> Buy Now</button></a>
  </div>



  <script>
    var myIndex = 0;
    carousel();

    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      myIndex++;
      if (myIndex > x.length) { myIndex = 1 }
      x[myIndex - 1].style.display = "block";
      setTimeout(carousel, 2000);
    }
  </script>


<hr>

<footer>
<div class="footer-content">
            <p>&copy; 2024 Amela Abdullahu - Gentrit Gashi . All rights reserved.</p>
            <ul class="footer-links">
                <li><a href="Footer/Privacy-Policy.php">Privacy Policy</a></li>
                <li><a href="Footer/terms.php">Terms of Service</a></li>
                <li><a href="Contact.php">Contact Us</a></li>
            </ul>
        </div>


</footer>

<style>
 
  footer {
    color: white;
    padding: 20px;
    text-align: center;
    background-color: #051622;
  }

  .footer-content {
    max-width: 1200px;
    margin: 0 auto;
    font-family: "Arial", sans-serif;
  }

  .footer-links {
    list-style: none;
    padding: 0;
    display: flex;
    justify-content: center;
    margin-top: 10px;
  }

  .footer-links li {
    margin: 0 10px;
  }

  .footer-links a {
    color: white;
    text-decoration: none;
  }

  @media only screen and (max-width: 768px) {
    .footer-links {
      flex-direction: column;
      align-items: center;
    }

    .footer-links li {
      margin: 10px 0;
    }
  }
</style>



</body>

</html>