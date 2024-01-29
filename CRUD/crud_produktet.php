
<?php
/* Fajlli per me i shfaq produkete me i editu dhe delete*/



include('../includes/connect.php');
?>



<!DOCTYPE html>

<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Produktet</title>
    
</head>
<body>
<h1 style="text-align: center;">Manipulo Produktin</h1>
<hr>
<form class="search-form" method="get">
    <label for="search">Kërko:</label>
    <input type="text" id="search" name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
    <input type="submit" value="Kërko">
</form>
<table class="table">
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Emri</th>
            <th>Pershkrimi</th>
            <th>Kategoria</th>
            <th>Cmimi</th>
            <th>Sasia</th>
            <th>Operacionet</th>
        </tr>
    </thead>
    <tbody>
    <script>
 document.addEventListener('DOMContentLoaded', function() {
    // Zgjedhja e fushes së kerkimit
    var searchInput = document.getElementById('search');

    // Shtypja e tastit "Delete" ose "Backspace" ne tastier
    searchInput.addEventListener('keyup', function(event) {
        // Kontrollo nese osht shtyp tasti "Delete"  ose "Backspace"
        if (event.key === 'Delete' || event.key === 'Backspace') {
            // Pastro fushën e kërkimit
            searchInput.value = '';

            // Heqja e parametrit search nga URL-ja kur fusha osht bosh
            if (searchInput.value === '') {
                removeSearchParam();

                window.location.href = 'crud_produktet.php';
            }
        }
    });

    // Heqja e parametrit 'search' nga URL-ja kur pordoruesi fshin kerkimin
    function removeSearchParam() {
        var url = window.location.href;
        var urlWithoutSearchParam = url.split('?')[0]; // Marrja e pjeses se URL-s pa parametrat
        window.history.pushState({}, document.title, urlWithoutSearchParam);
    }
});

</script>

   <?php
    $sql="SELECT * FROM products ";
    $result=mysqli_query($connect,$sql);


    $search_query = isset($_GET['search']) ? mysqli_real_escape_string($connect, $_GET['search']) : '';

  
    $sql = "SELECT * FROM products WHERE emri LIKE '%$search_query%' OR pershkrimi LIKE '%$search_query%'
     OR cmimi LIKE '%$search_query%'";
    $result = mysqli_query($connect, $sql);


    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $product_id = $row['product_id'];
            $emri = $row['emri'];
            $pershkrimi = $row['pershkrimi'];
            $cmimi = $row['cmimi'];
            $sasia = $row['sasia'];



            $product_categories_id = $row['product_categories'];
    
            $product_categories = $row['product_categories'];
            if (!isset($row['product_categories']) || empty($row['product_categories'])) {
                echo "Gabim: Kategoria ID eshte null.";
                continue;  
            }

            $select_category_query = "SELECT kategoria_titull FROM kategorit WHERE kategoria_id = $product_categories_id";
            $result_category_query = mysqli_query($connect, $select_category_query);
    
            
            if (!$result_category_query) {
                echo "Gabim ne kerkesen e titullit ne databaz: " . mysqli_error($connect);
                continue;  
            }
        $row_category = mysqli_fetch_assoc($result_category_query);
        $kategoria_titull = $row_category['kategoria_titull'];
          
            echo
            '<tr>
            <th> '.$product_id.' </th>
            <td>'.$emri.'</td>
            <td>'.$pershkrimi.'</td>

            <td>'.$kategoria_titull.'</td>
            <td>'.$cmimi.'</td>
            <td>'.$sasia.'</td>
            <td>
            <button class="edit-button"><a href="update.php? updateid='.$product_id.'">Edito</a></button>
            <button class=" delete-button"><a href="delete.php? deleteid='.$product_id.'">Delete</a></button>
            </td>
            
            
            </tr>';
            
            
            
            
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
        .edit-button {
    background-color: #007BFF;
  
    padding: 10px 20px;
    border: none;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.edit-button,a{
    color: white;
    font-family: "Arial", sans-serif;

}
.delete-button,a{
    color: white;
    font-family: "Arial", sans-serif;

}
.delete-button {
    background-color: red; 
    
    padding: 10px 20px;
    border: none;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

   

    </style>















</body>
</html>


