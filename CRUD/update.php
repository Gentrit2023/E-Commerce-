<?php
include('../includes/connect.php');
include('update_class.php');

$update_id = $_GET['updateid'];

$select_query = "SELECT * FROM products WHERE product_id = $update_id";
$result_query = mysqli_query($connect, $select_query);
$row = mysqli_fetch_assoc($result_query);

$emri = $row['emri'];
$pershkrimi = $row['pershkrimi'];
$product_categories = $row['product_categories'];
$cmimi = $row['cmimi'];
$sasia = $row['sasia'];
$product_image = $row['product_image'];

if (isset($_POST['update_product'])) {
    $Uprodukti = new UProdukti($connect);

    $Uprodukti->setProperties(
        $_POST['emri'],
        $_POST['pershkrimi'],
        $_POST['product_categories'],
        $_POST['cmimi'],
        $_POST['sasia'],
        $_FILES['product_image']['name'],
        $_FILES['product_image']['tmp_name'],
    );

  //  $Uprodukti->validateFields();
    $Uprodukti->uploadImage();
    $Uprodukti->updateProduct($update_id);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edito Produktet-Admin</title>

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

<h1 style="text-align: center;">Edito Produktin</h1>
<hr>
<div class="container-ins">
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Emri:</td>
                <td><input type="text" name="emri" value="<?php echo $emri; ?>" placeholder="Vendos Emrin e Produktit" required autocomplete="off"></td>
            </tr>

            <tr>
                <td>Pershkrimi:</td>
                <td>
                    <textarea id="pershkrimi" name="pershkrimi" rows="4" style="resize: none;"><?php echo $pershkrimi; ?></textarea>
                </td>
            </tr>

            <tr>
                <td>Kategoria:</td>
                <td>
                    <select name="product_categories" id="">
                        <option value="Selekto Kategorin">Selekto Kategorin</option>
                        <?php
                        $select_query = "SELECT * FROM kategorit";
                        $result_query = mysqli_query($connect, $select_query);
                        while ($row = mysqli_fetch_assoc($result_query)) {
                            $kategoria_titull = $row['kategoria_titull'];
                            $kategoria_id = $row['kategoria_id'];
                            $selected = ($kategoria_id == $kategori_id) ? 'selected' : '';
                            echo "<option value='$kategoria_id' $selected>$kategoria_titull</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Fotografia:</td>
                <td><input type="file" name="product_image" ></td>
            </tr>

            <tr>
                <td>Cmimi:</td>
                <td><input type="text" name="cmimi" value="<?php echo $cmimi; ?>" placeholder="Vendos Cmimin" required autocomplete="off"
                pattern="[0-9]+(\.[0-9]+)?"></td>
            </tr>
            <tr>
                <td>Sasia:</td>
                <td><input type="text" name="sasia" value="<?php echo $sasia; ?>" placeholder="Vendos Sasin" required autocomplete="off"
                pattern="[0-9]+"></td>
            </tr>
            <input type="hidden" name="update_id" value="<?php echo $update_id; ?>">
            <tr class="btn-insert">
                <td colspan="2"><input type="submit" name="update_product" value="Update" /></td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>
