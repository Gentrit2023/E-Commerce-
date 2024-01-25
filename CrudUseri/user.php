<?php

class user {
    private $id;
    private $emri;
    private $email;
    private $password;
    private $cpassword;
    private $role_as;

   
    public function __construct($row) {
        $this->id = $row['id'];
        $this->emri = $row['emri'];
        $this->email = $row['email'];
        $this->password = $row['password'];
        $this->cpassword = $row['cpassword'];
        $this->role_as = $row['role_as'];
        
        
    }

    public function getId() {
        return $this->id;
    }

    public function getEmri() {
        return $this->emri;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getcPassword() {
      return $this->cpassword;
  }

    public function getRole_as() {
        return $this->role_as;
    }
}


?>
