<?php
session_start();
include('includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shporta</title>
</head>
<body>
    <h1 style="text-align: center;">Shporta ime</h1>
    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>Emri Produktit</th>
                <th>Cmimi produktit</th>
                <th>Sasia</th>
                <th>Veprim</th>
                <th>Totali</th>
            </tr>
        </thead>
        <tbody>

        <?php
        if(isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                echo "
                <tr>
                    <td>{$value['emri']}</td>
                    <td>{$value['cmimi']}</td>
                    <td>{$value['Quantity']}</td>
                    <td><button class='btn btn-outline-danger'>REMOVE</button></td>
                </tr>";
            }
        }
        ?>

        </tbody>
    </table>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .search-form {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }
        input[type="text"] {
            padding: 5px;
        }

        input[type="submit"] {
            padding: 5px 10px;
            background-color: #4CAF50;
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
