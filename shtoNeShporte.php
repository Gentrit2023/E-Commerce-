<?php
session_start();
include('includes/connect.php');
include('admin_panel/Product.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
    $product = new Product($_POST);
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $myitems = array_column($_SESSION['cart'], 'emri');
    
    if (!in_array($product->getEmri(), $myitems)) {
        $_SESSION['cart'][] = [
            'emri' => $product->getEmri(),
            'cmimi' => $product->getCmimi(),
            'Quantity' => 1,
        ];
        echo "<script>
            alert('Produkti u shtua');
            window.location.href='index.php';
            </script>";
    } else {
        echo "<script>
            alert('Produkti eshte i shtuar');
            window.location.href='index.php';
            </script>";
    }
}
?>