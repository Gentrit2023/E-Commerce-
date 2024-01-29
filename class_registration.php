<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('includes/connect.php');

class UserRegistration
{
    private $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function loginUser($email, $password)
    {
        $login_query = "SELECT * FROM users WHERE email='$email' AND password = '$password' ";
        $login_query_run = mysqli_query($this->connect, $login_query);

        if (mysqli_num_rows($login_query_run) > 0) {
            $_SESSION['auth'] = true;

            $userdata = mysqli_fetch_array($login_query_run);
            $useremri = $userdata['emri'];
            $useremail = $userdata['email'];
            $role_as = $userdata['role_as'];

            $_SESSION['auth_user'] = [
                'emri' => $useremri,
                'email' => $useremail
            ];

            $_SESSION['role_as'] = $role_as;

            if ($role_as == 1) {
                $_SESSION['message'] = 'Mirë se vini në Dashboard';
                header('Location: admin_panel/index_admin.php');
                exit;
            } else {
                $_SESSION['message'] = 'U kyqet me sukses';
                header('Location:index.php');
                exit;
            }
        } else {
            $_SESSION['message'] = "Gabim";
            header('Location: Login.php');
            exit;
        }
    }

    public function restrictAccess()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
   
        if (!isset($_SESSION['auth'])) {
            header('Location:../Login.php');
            exit;
        }
   
        $role_as = isset($_SESSION['role_as']) ? $_SESSION['role_as'] : 0;
   
        if ($role_as != 1) {
            header('Location:../index.php');
            exit;
        }
    }
   
    public function registerUser($emri, $email, $password, $passwordperserite)
    {
        $check_email_query = "SELECT email FROM users WHERE email=?";
        $stmt = mysqli_prepare($this->connect, $check_email_query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $_SESSION['message'] = "Emaili është tashmë i regjistruar";
            header('Location: Register.php');
            exit;
        } else {
            $insert_query = "INSERT INTO users (emri, email, password, cpassword) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($this->connect, $insert_query);
            mysqli_stmt_bind_param($stmt, "ssss", $emri, $email, $password, $passwordperserite);
    
            if (mysqli_stmt_execute($stmt)) {
                header('Location: index.php');
                exit;
            } else {
                $_SESSION['message'] = "Diçka shkoi gabim gjatë regjistrimit të përdoruesit.";
                header('Location: Register.php');
                exit;
            }
        }
    }
}    

$userRegistration = new UserRegistration($connect);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register_btn'])) {
        $emri = mysqli_real_escape_string($connect, $_POST['emri']);
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);
        $passwordperserite = mysqli_real_escape_string($connect, $_POST['passwordperserite']);
       
        $userRegistration->registerUser($emri, $email, $password, $passwordperserite);
    }
    if (isset($_POST['login_btn'])) {
        $email = mysqli_real_escape_string($connect, $_POST['Email']);
        $password = mysqli_real_escape_string($connect, $_POST['Password']);
        $userRegistration->loginUser($email, $password);
    }
}
?>