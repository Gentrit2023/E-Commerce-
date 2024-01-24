<?php
include('includes/connect.php');
include('KontaktForma/kontakt_class.php');
session_start();

if (isset($_POST['insert_contact'])) {
    $kontakti = new Kontakti($connect);
    $kontakti->procesesoFormen();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ContactUs.css">
    <title>Online Store</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>



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

    <seletion class="contact">
        <div class="content">
            <h2>Contact Us</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsa nihil tenetur error veniam. Dolores
                distinctio
                officia quidem, ab saepe molestias beatae, omnis veniam nam rem fugiat libero et, esse facere.</p>
        </div>
        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class='bx bx-envelope'></i></div>
                    <div class="text">
                        <h2>Address</h2>
                        <p>Viale dell'Oceano Pacifico, 83 <br> Euroma2 Mall <br> Rome, Italy, 00144, IT</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class='bx bx-phone'></i></i></div>
                    <div class="text">
                        <h2>phone</h2>
                        <p>567-123-805</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class='bx bx-envelope'></i></i></div>
                    <div class="text">
                        <h2>Email</h2>
                        <p>Nike_Shoop@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="contactForm">
            <form method="post" action="">
                                    <h2>Send message</h2>
                    <div class="inputBox">
                        <input type="text" name="emri" required=" required">
                        <span>Full Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="email" required=" required">
                        <span>Email</span>
                    </div>
                    <div class="inputBox">
                        <textarea name="messages" required="required"></textarea>
                        <span>Type your Message...</span>
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="insert_contact" value="Send">
                    </div>
                </form>
            </div>
        </div>
    </seletion>

</body>

</html>