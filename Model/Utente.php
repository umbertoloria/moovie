<?php

class Utente{

    private $username;
    private $password;
    private $email;
    private $adminFlag;


    public function Utente($username, $email, $password, $adminFlag)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->adminFlag = $adminFlag;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setUsername($username){
        $this->username = $username;
    }
    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getEmail(){
    return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    public function getAdminFlag(){
        return $this->adminFlag;
    }

    public function setAdminFlag($adminFlag){
        $this->adminFlag = $adminFlag;
    }


}