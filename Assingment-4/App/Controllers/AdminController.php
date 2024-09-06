<?php
namespace App\Controllers\AdminControllers;

use App\Storage\StorageInterface;

class AdminController {
    private $storage;

    public function __construct(StorageInterface $storage) {
            $this->storage = $storage;
        }
    
        public function viewAllTransactions() {
            $transactions = $this->storage->getAllTransactions();
            return $transactions;
        }
    
        public function searchTransactionsByEmail($email) {
            $user = $this->storage->getUserByEmail($email);
            if ($user) {
                return $this->storage->getTransactionsByUserId($user->id);
            }
            return [];
        }
    
        public function viewAllCustomers() {
            $customers = $this->storage->getAllUsers();
            return array_filter($customers, function($user) {
                return $user->role === 'customer';
            });
        }
    }
    ?>
    