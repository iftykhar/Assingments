<?php

namespace App\Controllers;

use App\Models\User;
use App\Storage\FileStorage;
use App\Storage\StorageInterface;

class CustomerController {
    private $storage;

    public function __construct(StorageInterface $storage) {
        // $this->storage = new FileStorage(); 
        $this->storage = $storage;
    }

    public function dashboard() {
        session_start();

        if (!isset($_SESSION['username'])) {
            header("Location: ../../Public/login.php");
            exit();
        }

        include '../App/Views/Customer/dashboard.php';
    }

    public function deposit() {
        session_start();

        if (!isset($_SESSION['username'])) {
            header("Location: ../../Public/login.php");
            exit();
        }

                include '../App/Views/Customer/deposit.php';
    }

    public function transfer() {
        session_start();

        if (!isset($_SESSION['username'])) {
            header("Location: ../../Public/login.php");
            exit();
        }

        
        include '../App/Views/Customer/transfer.php';
    }

    public function withdraw() {
        session_start();

        if (!isset($_SESSION['username'])) {
            header("Location: ../../Public/login.php");
            exit();
        }

        
        include '../App/Views/Customer/withdraw.php';
    }
}
