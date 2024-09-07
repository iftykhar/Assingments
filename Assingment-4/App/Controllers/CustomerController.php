<?php
namespace App\Controllers\CustomerControllers;

use App\Storage\StorageInterface;
use App\Models\Transaction;

class CustomerController {
    private $storage;

    public function __construct(StorageInterface $storage) {
        $this->storage = $storage;
    }
    
    // Dashboard: Fetch user data and transactions
    public function dashboard($userId)
    {
        // Fetch user data
        $user = $this->storage->getUserById($userId);
        if (!$user) {
            return "User not found.";
        }

        // Fetch user transactions
        $transactions = $this->storage->getTransactionsByUserId($userId);

        // Return view with data (using include if you're not using a templating engine)
        return include 'path/to/views/Customer/dashboard.php';
    }

    // Deposit money into user account
    public function deposit($userId, $amount) {
        $user = $this->storage->getUserById($userId);
        
        // Validate amount
        if ($amount <= 0) {
            echo "Invalid deposit amount.";
            return;
        }
        
        if ($user) {
            $user->balance += $amount;
            $this->storage->saveUser($user);

            // Record deposit transaction
            $transaction = new Transaction(uniqid(), $userId, 'deposit', $amount, date('Y-m-d H:i:s'));
            $this->storage->saveTransaction($transaction);

            echo "Deposit successful!";
        } else {
            echo "User not found!";
        }
    }

    // Withdraw money from user account
    public function withdraw($userId, $amount) {
        $user = $this->storage->getUserById($userId);
        
        // Validate amount
        if ($amount <= 0) {
            echo "Invalid withdrawal amount.";
            return;
        }

        if ($user && $user->balance >= $amount) {
            $user->balance -= $amount;
            $this->storage->saveUser($user);

            // Record withdrawal transaction
            $transaction = new Transaction(uniqid(), $userId, 'withdraw', $amount, date('Y-m-d H:i:s'));
            $this->storage->saveTransaction($transaction);

            echo "Withdrawal successful!";
        } else {
            echo "Insufficient balance or user not found!";
        }
    }

    // Transfer money between two users
    public function transfer($fromUserId, $toUserEmail, $amount) {
        $fromUser = $this->storage->getUserById($fromUserId);
        $toUser = $this->storage->getUserByEmail($toUserEmail);

        // Validate amount
        if ($amount <= 0) {
            echo "Invalid transfer amount.";
            return;
        }

        if ($fromUser && $toUser && $fromUser->balance >= $amount) {
            // Update balances
            $fromUser->balance -= $amount;
            $toUser->balance += $amount;
            $this->storage->saveUser($fromUser);
            $this->storage->saveUser($toUser);

            // Record transfer transactions for both users
            $transactionFrom = new Transaction(uniqid(), $fromUserId, 'transfer', $amount, date('Y-m-d H:i:s'));
            $transactionTo = new Transaction(uniqid(), $toUser->id, 'transfer', $amount, date('Y-m-d H:i:s'));
            $this->storage->saveTransaction($transactionFrom);
            $this->storage->saveTransaction($transactionTo);

            echo "Transfer successful!";
        } else {
            echo "Transfer failed! Insufficient balance or user not found!";
        }
    }

    // View user transactions
    public function viewTransactions($userId) {
        $transactions = $this->storage->getTransactionsByUserId($userId);
        
        if (!$transactions) {
            return "No transactions found for this user.";
        }

        return $transactions;
    }

    // View user balance
    public function viewBalance($userId) {
        $user = $this->storage->getUserById($userId);
        if ($user) {
            return $user->balance;
        }
        return 0;
    }
}
?>
