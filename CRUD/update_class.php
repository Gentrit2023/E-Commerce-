<?php
session_start();
  if (isset($_SESSION['Email'])) {
    $Email = $_SESSION['Email'];
}
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

   /* public function validateFields() {
        if (empty($this->emri) || empty($this->pershkrimi) || empty($this->product_categories) || empty($this->product_image) || empty($this->cmimi) || empty($this->sasia)) {
            echo "<script>alert('Ju lutem plotesoni te gjitha fushat')</script>";
            exit();
        }
    }**/

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
        // Krijo një varg për të mbajtur ndryshimet në të dhënat e produktit
        $ndryshimet = array();
    
        // Kontrollo ndryshimet në të dhënat e produktit dhe shto ato në vargun e ndryshimeve
        if ($this->emri != '') {
            $ndryshimet[] = "Emri = '$this->emri'";
        }
        if ($this->pershkrimi != '') {
            $ndryshimet[] = "pershkrimi = '$this->pershkrimi'";
        }
        if ($this->product_categories != '') {
            $ndryshimet[] = "product_categories = '$this->product_categories'";
        }
        if ($this->product_image != '') {
            $ndryshimet[] = "product_image = '$this->product_image'";
        }
        if ($this->cmimi != '') {
            $ndryshimet[] = "cmimi = '$this->cmimi'";
        }
        if ($this->sasia != '') {
            $ndryshimet[] = "sasia = '$this->sasia'";
        }
    
        // Krijo query-në për të përditësuar të dhënat e produktit duke përfshirë ndryshimet e zbuluara
        $update_product_query = "UPDATE products SET ";
        $update_product_query .= implode(', ', $ndryshimet); // Së bashku me të gjitha ndryshimet të shtuara
        $update_product_query .= ", data = NOW()"; // Shto kohën e ndryshimit
        $update_product_query .= " WHERE product_id = $update_id"; // Për produktin me ID të dhënë
    
        // Ekzekuto query-në për të përditësuar të dhënat e produktit
        $result_query = mysqli_query($this->connect, $update_product_query);
    
        // Kontrollo nëse përditësimi është kryer me sukses
        if ($result_query) {
            echo "<script>alert('Produkti me ID $update_id u perditsua me sukses')</script>";
          
            $Email = $_SESSION['auth_user']['email'];
            $veprim = "Ndryshimi i produktit $update_id";
            $log_query = "INSERT INTO logs (email, veprimi, data_koha) VALUES ('$Email', '$veprim', NOW())";
            mysqli_query($this->connect, $log_query);
            header('location:crud_produktet.php');

        } else {
            echo "<script>alert('Ka ndodhur një gabim gjate perditesimit te produktit')</script>";
        }
    }
    
}

?>
