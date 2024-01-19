<?php
/*Klasa per mi ba update produktet  */
class UProdukti {
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
        move_uploaded_file($this->temp_image, "admin_panel/product_images/{$this->product_image}");
    }


    public function updateProductImage($product_id) {
       
        $update_image_query = "UPDATE products SET product_image = '$this->product_image' WHERE product_id = $product_id";

        $result_query = mysqli_query($this->connect, $update_image_query);

        if ($result_query) {
            echo "<script>alert('Me Sukses u be update fotografia')</script>";
        } else {
            echo "<script>alert('Ka ndodhur ni gabim gjat updetimit te fotografis')</script>";
        }
    }


    public function updateProduct($update_id) {
        $update_product = "UPDATE products SET 
            Emri = '$this->emri', 
            pershkrimi = '$this->pershkrimi', 
            product_categories = '$this->product_categories', 
            product_image = '$this->product_image', 
            cmimi = '$this->cmimi', 
            data = NOW(), 
            sasia = '$this->sasia' 
            WHERE product_id = $update_id"; 
    
        $result_query = mysqli_query($this->connect, $update_product);
    
        if ($result_query) {
            echo "<script>alert('Produkti me ID $update_id u perditsua me sukses')</script>";
        } else {
            echo "<script>alert('Ka ndodhur një gabim gjate perditesimit te produktit')</script>";
        }
    }
}

?>
