<?php

include('../includes/connect.php');
if (isset($_GET['deleteid'])) {

    $product_id = $_GET['deleteid'];

    $sql = "DELETE FROM products WHERE product_id = $product_id"; 

    $result = mysqli_query($connect, $sql);

    if ($result) {
        
        header('location:crud_produktet.php');
    } 
   
    
    else {
        die(mysqli_error($connect));
    }
}
?>
