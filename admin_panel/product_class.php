<?php

class Produkti {
    private $emri;
    private $pershkrimi;
    private $product_categories;
    private $cmimi;
    private $sasia;
    private $product_image;
    private $temp_image;
    private $connect;

    public function __construct($connect) {
        $this->connect = $connect;
    }

    public function setProperties($emri, $pershkrimi, $product_categories, $cmimi, $sasia, $product_image, $temp_image) {
        $this->emri = $emri;
        $this->pershkrimi = $pershkrimi;
        $this->product_categories = $product_categories;
        $this->cmimi = $cmimi;
        $this->sasia = $sasia;
        $this->product_image = $product_image;
        $this->temp_image = $temp_image;
    }

    public function validateFields() {
        if (empty($this->emri) || empty($this->pershkrimi) || empty($this->product_categories) || empty($this->product_image) || empty($this->cmimi) || empty($this->sasia)) {
            echo "<script>alert('Ju lutem plotesoni te gjitha fushat')</script>";
            exit();
        }
    }

    public function uploadImage() {
        move_uploaded_file($this->temp_image, "./product_images/{$this->product_image}");
    }

    public function insertProduct() {
        $insert_products = "INSERT INTO products (Emri, pershkrimi, product_categories, product_image, cmimi, data, sasia)
            VALUES ('$this->emri', '$this->pershkrimi', '$this->product_categories', '$this->product_image', '$this->cmimi', NOW(), '$this->sasia')";

        $result_query = mysqli_query($this->connect, $insert_products);

        if ($result_query) {
            $last_inserted_id = mysqli_insert_id($this->connect);
            echo "<script>alert('Produkti me ID $last_inserted_id u insertua me sukses')</script>";
        } else {
            echo "<script>alert('Ka ndodhur nje gabim gjat insertimit se produktit')</script>";
        }
    }
}

?>
