<?php

class UpdateUser{
    private $emri;
    private $email;
    private $password;
    

    public function __construct($connect) {
        $this->connect = $connect;
    }

    public function setProperties($emri, $email, $password) {
      $this->emri = $emri;
      $this->email = $email;
      $this->password = $password;
  }

  public function validateFields() {
    if (empty($this->emri) || empty($this->email) || empty($this->password)) {
        echo "<script>alert('Ju lutem plotesoni te gjitha fushat')</script>";
        exit();
    }
}

public function updateUser($update_id) {
  $update_users = "UPDATE users SET 
      emri = '$this->emri', 
      email = '$this->email', 
      password = '$this->password' 
      WHERE id = $update_id"; 

  $result_query = mysqli_query($this->connect, $update_users);

  if ($result_query) {
      echo "<script>alert('Useri me ID $update_id u perditsua me sukses')</script>";
  } else {
      echo "<script>alert('Ka ndodhur një gabim gjate perditesimit te produktit')</script>";
  }
}
}

?>
