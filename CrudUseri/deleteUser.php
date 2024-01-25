<?php
include('../includes/connect.php');
if (isset($_GET['deleteid'])) {

    $id = $_GET['deleteid'];

    $sql = "DELETE FROM users WHERE id = $id"; 

    $result = mysqli_query($connect, $sql);

    if ($result) {
        
        header('location:crudUseri.php');
    } 
   
    else {
        die(mysqli_error($connect));
    }
}
?>
