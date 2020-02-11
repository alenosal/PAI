<?php
class User {

    public $email;
    public $password;
    public $id;
    public $role;

    function setEmail($email){
        $this->email = $email;
    }

    function setPassword($password){
        $this->password = $password;
    }

    function setRole($role){
        $this->role = $role;
    }

    function setId($id){
        $this->email = $id;
    }

    function getEmail(){
        return $this->emial;
    }

    function getRole(){
        return $this->role;
    }

    
    function getId(){
        return $this->id;
    }
}
?>