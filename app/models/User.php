<?php

class User {
    //Các thuộc tính (thành phần) của user
    private $username;
    private $password;
    private $role;

    public function __construct($username, $password, $role) {
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
       
    }

    //Getter 
    public function getUsername() { return $this->username; }
    public function getPassword() { return $this->password; }
    public function getRole() { return $this->role; }
    
    //Setter

    public function setUsername() { return $this->username; }
    public function setPassword() { return $this->password; }
    public function setRole() { return $this->role; }
    
}