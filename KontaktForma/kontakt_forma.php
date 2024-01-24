<?php




include('../includes/connect.php');
?>


<!DOCTYPE html>

<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt Forma </title>
    
</head>
<body>
<h1 style="text-align: center;">Te dhanat nga Kontakti</h1>
<hr>
<form class="search-form" method="get">
    <label for="search">Kërko:</label>
    <input type="text" id="search" name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
    <input type="submit" value="Kërko">
</form>

<table class="table">
    <thead>
        <tr>
            <th>contact_id</th>
            <th>Emri</th>
            <th>Emaili</th>
            <th>Mesazhi</th>
            
        </tr>
    </thead>
    <tbody>



    <?php
        
        $search_query = isset($_GET['search']) ? mysqli_real_escape_string($connect, $_GET['search']) : '';

      
        $sql = "SELECT * FROM kontakti WHERE emri LIKE '%$search_query%' OR email LIKE '%$search_query%' OR messages LIKE '%$search_query%'";
        $result = mysqli_query($connect, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $contact_id = $row['contact_id'];
                $emri = $row['emri'];
                $email = $row['email'];
                $messages = $row['messages'];

                echo
                    '<tr>
                    <td>' . $contact_id . '</td>
                    <td>' . $emri . '</td>
                    <td>' . $email . '</td>
                    <td>' . $messages . '</td>
                    </tr>';
            }
        }
        ?>












    
    
    
    
    
    
    
    
    
    
    

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