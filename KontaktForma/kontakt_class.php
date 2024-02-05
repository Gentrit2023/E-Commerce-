<?php

class Kontakti {
    private $connect;

    public function __construct($connect) {
        $this->connect = $connect;
    }

    public function procesesoFormen() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["insert_contact"])) {
            $emri = mysqli_real_escape_string($this->connect, $_POST["emri"]);
            $email = mysqli_real_escape_string($this->connect, $_POST["email"]);
            $messages = mysqli_real_escape_string($this->connect, $_POST["messages"]);

            $sql = "INSERT INTO kontakti (emri, email, messages) VALUES ('$emri', '$email', '$messages')";


            if ($this->connect->query($sql) === TRUE) {
                $_SESSION['message'] = "Te dhenat jane shtuar me sukses.";
            } else {
                $_SESSION['message'] = "Gabim gjate shtimit te te dhenave: " . $this->connect->error;
            }


            $this->mbyllLidhjen();
        }
    }
}
?>
