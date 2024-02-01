<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include('admin_panel/Product.php');
include('includes/connect.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="Produkti.css">

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

    <img class="logo" src="logo3.png" alt="logo" width="100px" >

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
       <a class="fa fa-shopping-cart" href="shtoNeShporte.php">My Cart</a>
    </div>
  </header>

  <hr>
  



  <section class="s1">
    <div class="contenti">
      
        <a href="Men.php">Explore</a>
    </div>
    <div class="video-container">
        <video autoplay loop muted plays-inline class="back-video">
            <source src="videoWatch.mp4" type="video/mp4">
        </video>
    </div>
</section>
<hr>








<section class="s2">
  <div class="content-Slide">
    <div class="box">

      <img class="mySlides" src="Slider/1.jpeg" style="width:100%">
      <img class="mySlides" src="Slider/3.jpeg" style="width:100%">
      <img class="mySlides" src="Slider/4.jpeg" style="width:100%">
      <img class="mySlides" src="Slider/5.jpeg" style="width:100%">
      <img class="mySlides" src="Slider/6.jpeg" style="width:100%">

    </div>
  </div>
 
  </section>
<section >
  <hr style="opacity: 0.30;">
<div style="text-align:center; margin-top: 10px;">
    <span style=" padding: 0px 10px; color: white; font-size: 18px;font-family: Arial, sans-serif; ">REKOMANDIME PER JU !</span>
</div>
<hr style="opacity: 0.30;">
</section>
  <main class="container">
    <?php
    
    $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 6";
    $result_query = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result_query) > 0) {

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product = new Product($row);
            $product->generateProductCard();
        }
    } else {
        echo "Nuk u gjetën produkte në bazën e të dhënave.";
    }

    mysqli_close($connect);
    ?>
</main>

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