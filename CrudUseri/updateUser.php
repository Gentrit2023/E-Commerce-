<?php

include('../includes/connect.php');
include('updateUser_class.php');

$update_id = $_GET['updateid'];

if (isset($_POST['updateUser'])) {
    $UpdateUseri = new UpdateUser($connect);


    $UpdateUseri->setProperties(
        $_POST['emri'],
        $_POST['email'],
        $_POST['password']
    );

    $UpdateUseri->updateUser($update_id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edito Userat-Admin</title>

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

        textarea, select, input {
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
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>

<h1 style="text-align: center;">Edito Userin</h1>
<hr>
<div class="container-ins">
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Emri:</td>
                <td><input type="text" name="emri" placeholder="Vendos Emrin e Userit" required autocomplete="off"></td>
            </tr>

            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" placeholder="Emaili Userit" required autocomplete="off"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" placeholder="Password" required="required"></td>
            </tr>

            <input type="hidden" name="update_id" value="<?php echo $update_id; ?>">

            <tr class="btn-insert">
                <td colspan="2"><input type="submit" name="updateUser" value="Update" /></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
