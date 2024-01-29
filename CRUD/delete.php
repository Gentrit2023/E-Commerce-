<?php

include('../includes/connect.php');
session_start();

class ProduktiAction {
    private $connect;

    public function __construct($connect) {
        $this->connect = $connect;
    }

    public function deleteProduct($product_id) {
        $sql = "DELETE FROM products WHERE product_id = $product_id"; 

        $result = mysqli_query($this->connect, $sql);

        if ($result) {
            $Email = $_SESSION['auth_user']['email'];
            $veprim = "Fshirja e produktit $product_id";
            $log_query = "INSERT INTO logs (email, veprimi, data_koha) VALUES ('$Email', '$veprim', NOW())";
            mysqli_query($this->connect, $log_query);
            header('location:crud_produktet.php');
        } else {
            die(mysqli_error($this->connect));
        }
    }
}

if (isset($_GET['deleteid'])) {
    $product_id = $_GET['deleteid'];
    $produktiAction = new ProduktiAction($connect);
    $produktiAction->deleteProduct($product_id);
}

?>
