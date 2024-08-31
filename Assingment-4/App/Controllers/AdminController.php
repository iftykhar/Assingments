<?php

namespace App\Controllers;

use App\Models\User;
use App\Storage\FileStorage;

class AdminController {
    private $storage;

    public function __construct() {
        $this->storage = new FileStorage();  
    }

    public function addCustomer() {
        session_start();

        if ($_SESSION['role'] !== 'admin') {
            header("Location: ../../Public/login.php");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = new User($this->storage, $_POST['username'], $_POST['password'], $_POST['role']);

            if ($user->register()) {
                echo "Customer added successfully!";
            } else {
                echo "Customer addition failed! Username already exists.";
            }
        }

        include '../App/Views/Admin/add_customer.php';
    }

    public function viewCustomers() {
        session_start();

        if ($_SESSION['role'] !== 'admin') {
            header("Location: ../../Public/login.php");
            exit();
        }

         include '../App/Views/Admin/customers.php';
    }

    public function viewCustomerTransactions() {
        session_start();

        if ($_SESSION['role'] !== 'admin') {
            header("Location: ../../Public/login.php");
            exit();
        }

       
        include '../App/Views/Admin/customer_transactions.php';
    }

    public function viewTransactions() {
        session_start();

        if ($_SESSION['role'] !== 'admin') {
            header("Location: ../../Public/login.php");
            exit();
        }

       
        include '../App/Views/Admin/transactions.php';
    }
}
