<?php
session_start();

// Kontrolloni sesionin para se ta shkatërroni
if(isset($_SESSION['auth'])) {
    // Shkatërro sesionin
    session_destroy();
    
    // Ridrejto përdoruesin në faqen e log in
    header("location: login.php");
} else {
    // Nëse sesioni nuk ekziston, ridrejto përdoruesin në faqen e log in për siguri
    header("location: login.php");
}
?>
