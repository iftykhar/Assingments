<?php

namespace App\Controllers;

use App\Models\User;
use App\Storage\StorageInterface;
use App\Storage\FileStorage;

class CustomerController
{
    protected $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    private function checkSession()
    {
        session_start();
        if (!isset($_SESSION['username']) || !isset($_SESSION['user_id'])) {
            header("Location: ../../Public/login.php");
            exit();
        }
    }

    public function dashboard($userId)
    {
        $this->checkSession();

        // Fetch user data
        $user = $this->storage->getUserById($userId);
        if (!$user) {
            return "User not found.";
        }

        // Fetch user transactions
        $transactions = $this->storage->getUserTransactions($userId);

        // Return view with data
        return view('Customer/dashboard', [
            'user' => $user,
            'transactions' => $transactions,
        ]);
    }

    public function deposit($userId)
    {
        $this->checkSession();

        // Additional logic for deposit can go here

        return view('Customer/deposit', [
            'user' => $this->storage->getUserById($userId),
        ]);
    }

    public function transfer($userId)
    {
        $this->checkSession();

        // Additional logic for transfer can go here

        return view('Customer/transfer', [
            'user' => $this->storage->getUserById($userId),
        ]);
    }

    public function withdraw($userId)
    {
        $this->checkSession();

        // Additional logic for withdraw can go here

        return view('Customer/withdraw', [
            'user' => $this->storage->getUserById($userId),
        ]);
    }
}
