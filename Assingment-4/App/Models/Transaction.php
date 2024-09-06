<?php
namespace App\Models;

class Transaction {
    public $id;
    public $userId;
    public $type; // 'deposit', 'withdraw', or 'transfer'
    public $amount;
    public $date;

    public function __construct($id, $userId, $type, $amount, $date) {
        $this->id = $id;
        $this->userId = $userId;
        $this->type = $type;
        $this->amount = $amount;
        $this->date = $date;
    }
}
?>
