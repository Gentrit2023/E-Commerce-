<?php
include('includes/connect.php');
include("admin_panel/Product.php");

// Kontrollo sesionin
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Kontrollo nese eshte bere submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add_to_cart"])) {
        // Shto produktin ne sesion
        $product_id = $_POST["add_to_cart"];
        
        // Kontrollo nese quantity ekziston ne $_POST dhe nese po, merr vleren
        $quantity = isset($_POST["quantity"]) ? $_POST["quantity"] : 1;

        // Kontrollo nese produkti ekziston tashme ne kart
        if (isset($_SESSION['cart'][$product_id])) {
            // kqyre sasisn nese o produkti ne kart
            $_SESSION['cart'][$product_id]['quantity'] += $quantity;
        } else {
            // shtoje ne session nese nuk o
            $_SESSION['cart'][$product_id] = [
                'product' => new Product(getProductInfoById($product_id)),
                'quantity' => $quantity,
            ];
        }
    } elseif (isset($_POST["update_cart_item"])) {
        // menaxho sasinë e produktit ne kart
        $update_product_id = $_POST["update_quantity"];
        $new_quantity = isset($_POST["new_quantity_" . $update_product_id]) ? $_POST["new_quantity_" . $update_product_id] : 1;

        // Sigurohu qe sasia ka me kan nr pozitiv
        if ($new_quantity > 0) {
            $_SESSION['cart'][$update_product_id]['quantity'] = $new_quantity;
        }
    } elseif (isset($_POST["remove_from_cart"])) {
        // Fshij produktin nga sesioni
        $remove_product_id = $_POST["remove_from_cart"];
        unset($_SESSION['cart'][$remove_product_id]);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
<body>

    <h2>Karta</h2>

    <table border="1">
        <tr>
            <th>Product ID</th>
            <th>Emri</th>
            <th>Cmimi</th>
            <th>Sasia</th>
            <th>Veprime</th>
        </tr>
        <?php
        // Shfaqi  produktet ne kart  duke perdor sesionin
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $product_id => $cart_item) {
                $product = $cart_item['product'];
                $quantity = $cart_item['quantity'];
                echo "<tr>";
                echo "<td>{$product->getProductId()}</td>";
                echo "<td>{$product->getEmri()}</td>";
                echo "<td>$" . number_format($product->getCmimi(), 2, '.', ',') . "</td>";
                echo "<td>";
                echo "<form action='shtoNeShporte.php' method='POST'>";
                echo "<input type='hidden' name='update_quantity' value='{$product->getProductId()}'>";
                echo "<input type='number' name='new_quantity_{$product->getProductId()}' value='{$quantity}' min='1'>";
                echo "<button class='btnU'type='submit' name='update_cart_item'>Update</button>";
                echo "</form>";
                echo "</td>";
                echo "<td>";
                echo "<form action='shtoNeShporte.php' method='POST'>";
                echo "<input type='hidden' name='remove_from_cart' value='{$product->getProductId()}'>";
                echo "<button type='submit'>Remove</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>

    <p>Totali i kartës: $<?php echo number_format(calculateTotalPrice(), 2, '.', ','); ?></p>

    <form action="pagesa.php" method="POST">
        <button type="submit">Vazhdo tek Pagesa</button>
    </form>
    <button onclick="goBack()" class="btn">Vazhdo Blerjen</button>

<script>
    function goBack() {
        window.history.back();
    }
</script>
    <?php
function calculateTotalPrice() {
    $totalPrice = 0;
    // Llogarit totalin e qmimit te kartes duke perdor sesionin
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $cart_item) {
            $product = $cart_item['product'];
            $quantity = $cart_item['quantity'];
            $totalPrice += $product->getCmimi() * $quantity;
        }
    }
    return $totalPrice;
}

function getProductInfoById($product_id) {
    global $connect;
    $query = "SELECT * FROM products WHERE product_id = $product_id";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    return $row;
}
?>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            margin: 10px 0;
        }

        input[type="number"] {
            width: 50px;
        
        }

        button {
            padding: 6px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            margin-left:5px;
        }

        button:hover {
            background-color: #45a049;
        }

        button[type="submit"] {
            background-color: #008CBA;
        }

        button[type="submit"]:hover {
            background-color: #0077a3;
        }

        .btn{
            padding: 6px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            margin-left:5px;
            text-decoration: none;
 
        } 
       
        p {
            font-size: 18px;
            margin-top: 10px;
        }
    </style>
</body>
</html>

