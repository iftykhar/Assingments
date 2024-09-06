<?php
namespace App\Controllers\CustomerControllers;

use App\Storage\StorageInterface;
use App\Models\Transaction;

class CustomerController {
    private $storage;

    public function __construct(StorageInterface $storage) {
        $this->storage = $storage;
    }

    public function dashboard($userId)
    {
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

    public function deposit($userId, $amount) {
        $user = $this->storage->getUserById($userId);
        if ($user) {
            $user->balance += $amount;
            $this->storage->saveUser($user);
            $transaction = new Transaction(uniqid(), $userId, 'deposit', $amount, date('Y-m-d H:i:s'));
            $this->storage->saveTransaction($transaction);
            echo "Deposit successful!";
        } else {
            echo "User not found!";
        }
    }

    public function withdraw($userId, $amount) {
        $user = $this->storage->getUserById($userId);
        if ($user && $user->balance >= $amount) {
            $user->balance -= $amount;
            $this->storage->saveUser($user);
            $transaction = new Transaction(uniqid(), $userId, 'withdraw', $amount, date('Y-m-d H:i:s'));
            $this->storage->saveTransaction($transaction);
            echo "Withdrawal successful!";
        } else {
            echo "Insufficient balance or user not found!";
        }
    }

    public function transfer($fromUserId, $toUserEmail, $amount) {
        $fromUser = $this->storage->getUserById($fromUserId);
        $toUser = $this->storage->getUserByEmail($toUserEmail);
        if ($fromUser && $toUser && $fromUser->balance >= $amount) {
            $fromUser->balance -= $amount;
            $toUser->balance += $amount;
            $this->storage->saveUser($fromUser);
            $this->storage->saveUser($toUser);
            $transaction = new Transaction(uniqid(), $fromUserId, 'transfer', $amount, date('Y-m-d H:i:s'));
            $this->storage->saveTransaction($transaction);
            echo "Transfer successful!";
        } else {
            echo "Transfer failed! Insufficient balance or user not found!";
        }
    }

    public function viewTransactions($userId) {
        $transactions = $this->storage->getTransactionsByUserId($userId);
        return $transactions;
    }

    public function viewBalance($userId) {
        $user = $this->storage->getUserById($userId);
        if ($user) {
            return $user->balance;
        }
        return 0;
    }
}
?>
