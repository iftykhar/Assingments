<?php

// namespace App\Storage;

// interface StorageInterface{
//     public function userExists($username);
//     public function saveUser($username,$password, $role);
//     public function getUser($username);
// }

namespace App\Storage;

use App\Models\User;
use App\Models\Transaction;

interface StorageInterface {
    public function saveUser(User $user);
    public function getUserById($id);
    public function getUserByEmail($email);
    public function saveTransaction(Transaction $transaction);
    public function getAllUsers();
    public function getTransactionsByUserId($userId);
    public function getAllTransactions();
}
?>
