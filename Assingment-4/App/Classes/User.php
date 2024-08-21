<?php

namespace App\Classes\User;

class User{

    private $userDir = "file/";

    public function __construct()
    {
        if(!is_dir($this->userDir)){
            mkdir($this->userDir,0777,true);
        }
    }

    public function register($name,$email,$password){
        if(empty($email)||empty($password)){
            return["error" => "please fill all fields."];
        }

        $userFile = $this->userDir . $email . ".txt";
        if(file_exists($userFile)){
            return ["error" => "Email already registered."];
        }
        
        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
        if(file_put_contents($userFile,$hashedPassword) !== false){
            return ["success" => "registration successful! Now log in."];
        }else {
            return ["error" => "Failed to save user data."];
        }
    }

    public function login($email, $password){
        if(empty($email) || empty($password)){
            return ["error" => "Please fill in all fields."];
        }

        $userFile = $this->userDir . $email . ".txt";
        if(!file_exists($userFile)){
            return ["error" => "Username does not Exist."];
        }

        $storedPassword = file_get_contents($userFile);
        if(password_verify($password,$storedPassword)){
            $_SESSION["email"] = $email;
            return ["success" => "Login successfull"];
        }else{
            return ["error" => "Incorrect Password."];
        }

    }

}
?>