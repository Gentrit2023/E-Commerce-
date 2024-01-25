<?php

include('includes/connect.php');
include('admin_panel/Product.php');


session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Kontrollo nese eshte bere submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit_pagesa"])) {
        $emri = $_POST["emri"];
        $mbiemri = $_POST["mbiemri"];
        $email = $_POST["email"];
        $qyteti = $_POST["qyteti"];
        $adresa = $_POST["adresa"];
        $numri_telefonit = $_POST["numri_telefonit"];
        $cartnumber = $_POST["cartnumber"];
        $cvv = $_POST["cvv"];
        $viti = $_POST["viti"];

        // Validimi dhe ruajtja ne databaze
        $emri = mysqli_real_escape_string($connect, $emri);
        $mbiemri = mysqli_real_escape_string($connect, $mbiemri);
        $email = mysqli_real_escape_string($connect, $email);
        $qyteti = mysqli_real_escape_string($connect, $qyteti);
        $adresa = mysqli_real_escape_string($connect, $adresa);
        $numri_telefonit = mysqli_real_escape_string($connect, $numri_telefonit);
        $cartnumber = mysqli_real_escape_string($connect, $cartnumber);
        $cvv = mysqli_real_escape_string($connect, $cvv);
        $viti = mysqli_real_escape_string($connect, $viti);

        $insert_query = "INSERT INTO pagesa (emri, mbiemri, email, qyteti, adresa, numri_telefonit) 
                         VALUES ('$emri', '$mbiemri', '$email', '$qyteti', '$adresa', '$numri_telefonit')";

        mysqli_query($connect, $insert_query);

        echo "<script>alert('Pagesa u krye me sukses!'); window.location = 'index.php';</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 
</head>
<body>

    <h1 style="text-align: center;">Forma e Pagesës</h1>
    <hr>
    <div class="container-ins">
        <form action="" method="post">
            <table>
                <tr>
                    <td>Emri:</td>
                    <td><input type="text" name="emri" placeholder="Vendos Emrin" required autocomplete="off"></td>
                </tr>

                <tr>
                    <td>Mbiemri:</td>
                    <td><input type="text" name="mbiemri" placeholder="Vendos Mbiemrin" required autocomplete="off"></td>
                </tr>

                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" placeholder="Vendos Email-in" required autocomplete="off"></td>
                </tr>

                <tr>
                    <td>Qyteti:</td>
                    <td><input type="text" name="qyteti" placeholder="Vendos Qytetin" required autocomplete="off"></td>
                </tr>

                <tr>
                    <td>Adresa:</td>
                    <td><input type="text" name="adresa" placeholder="Vendos Adresën" required autocomplete="off"></td>
                </tr>

                <tr>
                    <td>Nr. Telefonit:</td>
                    <td><input type="text" name="numri_telefonit" placeholder="Vendos Nr. Telefonit" required autocomplete="off"></td>
                </tr>

                <tr>
                    <td>Numri i Kartës:</td>
                    <td><input type="text" name="cartnumber" placeholder="Vendos Numrin e Kartës" required autocomplete="off"></td>
                </tr>

                <tr>
                    <td>CVV:</td>
                    <td><input type="text" name="cvv" placeholder="Vendos CVV" required autocomplete="off"></td>
                </tr>

                <tr>
                    <td>Viti i Skadencës:</td>
                    <td><input type="text" name="viti" placeholder="Vendos Vitin e Skadencës" required autocomplete="off"></td>
                </tr>

                <tr class="btn-insert">
                    <td colspan="2"><input type="submit" name="submit_pagesa" value="Blej Tani!" /></td>
                </tr>
            </table>
        </form>
    </div>
  
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        
        input[type="text"] {
            padding: 5px;
        }

        input[type="submit"] {
            padding: 5px 10px;
            background-color: #1a6ee5;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .table {
            width: 100%;
            background-color: #eee;
            border: 1px solid #dee2e6;
            border-collapse: collapse;
            margin-bottom: 1rem;
            display
        }

        .table th, td {
            padding: 0.75rem;
            border-bottom: 1px solid #fff;
            border-right: 1px solid #fff;
        }

        .table th {
            background-color: #007bff;
            color: #fff;
        }
       
    </style>
</body>
</html>
