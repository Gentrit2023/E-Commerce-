<?php

class Product {
    private $product_id;
    private $emri;
    private $pershkrimi;
    private $product_categories;
    private $cmimi;
    private $sasia;
    private $product_image;
    private $temp_image;

   
    public function __construct($row) {
        $this->product_id = $row['product_id'];
        $this->emri = $row['emri'];
        $this->pershkrimi = $row['pershkrimi'];
        $this->product_image = $row['product_image'];
        $this->cmimi = $row['cmimi'];
        $this->product_categories = $row['product_categories'];
        
        
    }

    public function getProductId() {
        return $this->product_id;
    }

    public function getEmri() {
        return $this->emri;
    }

    public function getPershkrimi() {
        return $this->pershkrimi;
    }

    public function getProduct_image() {
        return $this->product_image;
    }

    public function getCmimi() {
        return $this->cmimi;
    }

    public function getProduct_categories() {
        return $this->product_categories;
    }

   


    public function iPerketKategoris($categoryId) {
        return $this->product_categories == $categoryId;
    }

    
    public function generateProductCard($categoryId = null) {
        if ($categoryId === null || $this->iPerketKategoris($categoryId)) {
            echo '<section class="card">';
            echo '<form action="shtoNeShporte.php" method="POST">';
            echo '<div class="product-image">';
            echo '<img src="admin_panel/product_images/' . $this->getProduct_image() . '" alt="' . $this->getEmri() . '" draggable="false" />';
            echo '</div>';
            echo '<div class="product-info">';
            echo '<h2>' . $this->getEmri() . '</h2>';
            echo '<p>' . $this->getPershkrimi() . '</p>';
            echo '<div class="price">$' . $this->getCmimi() . '</div>';
            echo '</div>';
            echo '<div class="btn1">';
            echo '<button type="submit" name="add_to_cart" class="buy-btn" value="' . $this->getProductId() .
             '" data-product-id="' . $this->getProductId() . '">Add to cart</button>';
            
            echo '</div>';
            echo '</form>';
            echo '</section>';
        }
    }
    
    
}

?>
