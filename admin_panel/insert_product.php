<?php
include('../includes/connect.php');

if(isset($_POST['insert_product'])){
    $emri = $_POST['emri'];
    $pershkrimi = $_POST['pershkrimi'];
    $product_categories = $_POST['product_categories'];
    $cmimi = $_POST['cmimi'];
    $sasia = $_POST['sasia'];

    $product_image = $_FILES['product_image']['name'];
    $temp_image = $_FILES['product_image']['tmp_name'];

    if($emri=='' or $pershkrimi=='' or $product_categories=='' or $product_image=='' or $cmimi=='' or $sasia==''){
        echo "<script>alert('Ju lutem plotesoni te gjitha fushat')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image,"./product_images/$product_image");
    }

    $insert_products = "INSERT INTO products (Emri, pershkrimi, product_categories, product_image, cmimi, data, sasia)
    VALUES ('$emri', '$pershkrimi', '$product_categories', '$product_image', '$cmimi', NOW(), '$sasia')";

    $result_query=mysqli_query($connect,$insert_products);

    if($result_query){
        $last_inserted_id = mysqli_insert_id($connect);
        echo  "<script>alert('Produkti me ID $last_inserted_id u insertua me sukses')</script>";
    } else {
        echo  "<script>alert('Ka ndodhur nje gabim gjat insertimit se produktit')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserto Produktet-Admin</title>

    <style>
        .container-ins {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        table {
            width: 100%;
            max-width: 400px; 
            margin: 0 auto; 
        }

        td {
            padding: 10px;
        }

        textarea, select ,input{
            border-radius: 10px;
            border-color: black;
            font-family: "Montserrat", sans-serif;
            color: black;
            padding: 10px;
            width: 100%; 
            box-sizing: border-box; 
            margin-bottom: 10px;
        }

        .btn-insert {
            text-align: center; 
           
        }

        .btn-insert input {
            display: inline-block;
            background-color:red;
            color:white;

        }
    </style>
</head>
<body>

<h1 style="text-align: center;">Inserto Produktin</h1>
<hr>
<div class="container-ins">
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Emri:</td>
                <td><input type="text" name="emri" placeholder="Vendos Emrin e Produktit" required autocomplete="off"></td>
            </tr>

            <tr>
                <td>Pershkrimi:</td>
                <td>
                    <textarea id="pershkrimi" name="pershkrimi" rows="4" style="resize: none;"></textarea>
                </td>
            </tr>

            <tr>
                <td>Kategoria:</td>
                <td>
                    <select name="product_categories" id="">
                        <option value="Selekto Kategorin">Selekto Kategorin</option>
                       <?php 
                      $select_query = "SELECT * FROM kategorit";

                       $result_query=mysqli_query($connect, $select_query);
                       while($row=mysqli_fetch_assoc($result_query)){

                        $kategoria_titull=$row['kategoria_titull'];
                        $kategoria_id=$row['kategoria_id'];
                        echo  "<option value='$kategoria_id'>$kategoria_titull</option>";
                       }
                       ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Fotografia:</td>
                <td><input type="file" name="product_image" required="required"></td>
            </tr>

            <tr>
                <td>Cmimi:</td>
                <td><input type="text" name="cmimi" placeholder="Vendos Cmimin" required autocomplete="off"></td>
            </tr>
            <tr>
                <td>Sasia:</td>
                <td><input type="text" name="sasia" placeholder="Vendos Sasin" required autocomplete="off"></td>
            </tr>

            <tr class="btn-insert">
                <td colspan="2"><input type="submit" name="insert_product" value="Submit" /></td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>
