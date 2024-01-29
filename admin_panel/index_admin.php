<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('../class_registration.php');

$UserRegistration = new UserRegistration($connect);
$UserRegistration->restrictAccess();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="index_admin.css"/>
    <?php
    if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
        echo '<script>alert("' . $_SESSION['message'] . '");</script>';
        $_SESSION['message'] = '';
    }
    ?>

</head>
<body>
<div class="container-navadmin">

<div class="logo">
<img src="../logo3.png" alt="logo1" width="100%" padding 10px>


</div>    
<nav class="nav-item">
    <ul class="nav-bar">
<li>
<?php
    
 
    if(isset($_SESSION['auth_user']) && isset($_SESSION['auth_user']['emri'])) {
        echo '<a href="" class="nav-link">Welcome ' . $_SESSION['auth_user']['emri'] . '</a>';
    } 


?>
</li>


    </ul>

</nav>




</div>   

<div class="ad-nav">

<h3>MENAXHONI DETAJET </h3>

</div>
<hr >

<div class="button-ad">

<div class="butonat">

<button><a href="insert_product.php">Inserto Produktet</a></button>
<button><a href="../CRUD/crud_produktet.php">CRUD Produktet</a></button>
<button><a href="../KontaktForma/kontakt_forma.php">Kontakt Forma</a></button>

<button><a href="pagesat_admin.php">Porosit</a></button>
<button><a href="../CrudUseri/crudUseri.php">Userat</a></button>
<button><a href="../Logs/logs.php">Logs</a></button>

<a class="btn" href="../logout.php" ><button style="  background-color:red;">Log Out</button></a>

            
          
         


</div>


</div>

 
            















</body>
</html>