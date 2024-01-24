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

           
        }
    }

   
    public function mbyllLidhjen() {
        $this->connect->close();
    }
}
?>
