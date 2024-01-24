<?php

session_start();

function kontrolloSesioninAdmin() {
    if (!isset($_SESSION['auth']) && $_SESSION['roli_as'] !== 1) {
        $_SESSION['mesazhi'] = 'Ju nuk keni qasje në këtë faqe. Ju lutem kyçuni si administrator.';
        header('Location: ../Login.php');
        exit;
    }

    // Shtoni këtë verifikim shtesë për të bllokuar përdoruesit e thjeshtë
    if ($_SESSION['roli_as'] !== 1) {
        $_SESSION['mesazhi'] = 'Ju nuk keni qasje në këtë faqe. Ju lutem kyçuni me një llogari të thjeshtë.';
        header('Location: ../Login.php');
        exit;
    }
}



?>
