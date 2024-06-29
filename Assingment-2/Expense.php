<?php
require_once './stricttype.php';

class Expense extends Transaction{

    public function __construct(){

        $this->type = TransferType::EXPENSE;
    }
}