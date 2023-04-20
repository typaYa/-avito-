<?php

class test
{

    public $login;
    public $password;
    public $username;
    public function __construct($password,$login,$username){
        $this->password=$password;
        $this->login=$login;
        $this->username=$username;
    }
    public function createNewUser($connect){
        mysqli_query($connect,"INSERT INTO `login` (`id`, `login`, `password`, `username`) VALUES (NULL, '$this->login','$this->password', '$this->username')");
    }


}