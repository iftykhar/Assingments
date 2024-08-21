<?php

namespace App\Controllers;

use App\Models\User;
use App\Storage\FileStorage;

class AuthController{

    private $storage;

    public function __construct()
    {
        $this->storage = new FileStorage;
    }

    public function register(){

        session_start();

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $user = new User($this->storage, $_POST['username'], $_POST['password'], $_POST['role']);

            if($user->register()){
                echo "Successfull Registration";
            }else{
                echo "Registration failed! Username already exists";
            }
        }
        // include './App/Views/Auth/';
        include './App/Views/Auth/register.php';
    }

    // public function dashboard(){
    //     session_start();

    //     if(!isset($_SESSION['username'])){
    //         header("Location: login.php");
    //         exit();
    //     }

    //     include './App/Views/Auth/Dashboard.php';
    // }

    public function login() {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = new User($this->storage, $_POST['username'], $_POST['password']);

            if ($user->login()) {
                $_SESSION['username'] = $user->username;
                $_SESSION['role'] = $user->role;
                header("Location: ../App/Views/Customer/dashboard.php");
            } else {
                echo "Login failed!";
            }
        }

        include '../App/Views/Auth/login.php';
    }

    public function logout(){

        session_start();
        session_unset();
        session_destroy();
        // header("Location: login.php");
        header("Location: ./Public/login.php");
        exit();
    }
}