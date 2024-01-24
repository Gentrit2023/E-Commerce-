<?php 
session_start();

include('includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AboutUs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <title>Online Store</title>

</head>

<body>

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
            <i class="fa fa-shopping-cart"></i>
        </div>
    </header>
    <hr>

    <div class="heading">
        <h1>About Us</h1>
        <p>
            Where innovation meets style in every stride. Unleash your potential with cutting-edge technology and iconic
            designs that redefine performance and fashion. Nike: Fueling your journey to greatness, one step at a time.
        </p>
    </div>
    <div class="container">
        <section class="about">
            <div class="about-img">
                <img src="aboutUs.png.jpg" alt="NIKE">
            </div>
            <div class="about-content">
                <h2>Step into greatness with Nike</h2>
                <p>
                    Embark on a journey of excellence with Nike, a brand synonymous with the pinnacle of innovation and
                    unmatched
                    style. From the courts to the streets, Nike's commitment to pushing boundaries shines through in
                    every
                    meticulously crafted shoe. Experience the fusion of cutting-edge technology and iconic design, where
                    each pair
                    tells a story of performance, passion, and perseverance. Whether you're an athlete chasing victory
                    or a
                    trendsetter making a statement, Nike is your partner in unlocking your full potential.
                    At Nike, we are more than a brand; we are a movement fueled by innovation and inspiration. Our
                    mission is
                    simple: to bring cutting-edge innovation and unparalleled performance to every athlete worldwide. We
                    believe
                    that if you have a body, you are an athlete, and our commitment is to empower everyone to reach
                    their full
                    potential.
                </p>
                <a href="https://www.nike.com/" target="_blank" class="read-more">Read More</a>
            </div>
        </section>
    </div>

</body>

</html>