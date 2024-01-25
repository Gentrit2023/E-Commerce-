<?php
include('../includes/connect.php');

$sql_pagesat = "SELECT * FROM pagesa";
$result_pagesat = mysqli_query($connect, $sql_pagesat);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porosit</title>
</head>
<body>
    <h1 style="text-align: center;">Porosit</h1>
    <hr>
    <form class="search-form" method="get">
        <label for="search">Kërko:</label>
        <input type="text" id="search" name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <input type="submit" value="Kërko">
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>ID e Pagesës</th>
                <th>Emri</th>
                <th>Mbiemri</th>
                <th>Emaili</th>
                <th>Qyteti</th>
                <th>Adresa</th>
                <th>Numri Telefonit</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result_pagesat) {
                while ($row_pagesa = mysqli_fetch_assoc($result_pagesat)) {
                    echo "<tr>";
                    echo "<td>{$row_pagesa['pagesa_id']}</td>";
                    echo "<td>{$row_pagesa['emri']}</td>";
                    echo "<td>{$row_pagesa['mbiemri']}</td>";
                    echo "<td>{$row_pagesa['email']}</td>";
                    echo "<td>{$row_pagesa['qyteti']}</td>";
                    echo "<td>{$row_pagesa['adresa']}</td>";
                    echo "<td>{$row_pagesa['numri_telefonit']}</td>";
                  
                    echo "</tr>";
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