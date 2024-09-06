<?php
namespace App\Storage;

use App\Models\User;
use App\Models\Transaction;

class FileStorage implements StorageInterface {
    private $userFile = __DIR__ . '/../../Data/Users/users.txt';
    private $transactionFile = __DIR__ . '/../../Data/Transactions/transactions.txt';

    public function saveUser(User $user) {
        $data = json_encode($user) . PHP_EOL;
        file_put_contents($this->userFile, $data, FILE_APPEND);
    }

    public function getUserById($id) {
        return $this->findUser(function($user) use ($id) {
            return $user->id == $id;
        });
    }

    public function getUserByEmail($email) {
        return $this->findUser(function($user) use ($email) {
            return $user->email == $email;
        });
    }

    public function getAllUsers() {
        return $this->getUsers();
    }

    public function saveTransaction(Transaction $transaction) {
        $data = json_encode($transaction) . PHP_EOL;
        file_put_contents($this->transactionFile, $data, FILE_APPEND);
    }

    public function getTransactionsByUserId($userId) {
        return $this->findTransactions(function($transaction) use ($userId) {
            return $transaction->userId == $userId;
        });
    }

    public function getAllTransactions() {
        return $this->getTransactions();
    }

    private function findUser($callback) {
        $users = $this->getUsers();
        foreach ($users as $user) {
            if ($callback($user)) {
                return $user;
            }
        }
        return null;
    }

    private function getUsers() {
        $users = file($this->userFile, FILE_IGNORE_NEW_LINES);
        return array_map(function($user) {
            return json_decode($user);
        }, $users);
    }

    private function findTransactions($callback) {
        $transactions = $this->getTransactions();
        return array_filter($transactions, $callback);
    }

    private function getTransactions() {
        $transactions = file($this->transactionFile, FILE_IGNORE_NEW_LINES);
        return array_map(function($transaction) {
            return json_decode($transaction);
        }, $transactions);
    }
}
?>
