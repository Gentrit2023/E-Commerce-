<?php
include('admin_panel/Product.php');


include('includes/connect.php');

$select_query = "SELECT * FROM `products` ORDER BY emri";
$result_query = mysqli_query($connect, $select_query);

$desiredCategoryId = 1;

?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Produkti.css">
    
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    
    <title>Online Store</title>

</head>

<body style="background-color:#051622;">


    <header>


        <img class="logo" src="logo1.png" alt="logo" width="100px" padding 10px>
        <nav>
       <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>


        <ul class="nav_list">
            <li><a href="index.php">Home</a></li>
            <li><a href="Men.php">Men</a></li>
            <li><a href="Woman.php">Woman</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
            <li><a href="Contact.php">Contact</a></li>
        </ul>

        </nav>
        <a class="btn" href="Login.php"><button>Log In</button></a>
        <div class="btnCart">
            <i class="fa fa-shopping-cart"></i>
        </div>
    </header>
    <hr>

    
            <h1 class="tit">MEN</h1>
           
  
            <main class="container">
        <?php
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product = new Product($row);
            $product->generateProductCard($desiredCategoryId);
        }
        ?>
    </main>



          <section class="s1"> </section>

       
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