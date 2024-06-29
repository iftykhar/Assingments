<?php
require_once './stricttype.php';

class ExpenseCategory extends Category{

    public function __construct(string $name=""){

        $this->type = TransferType::EXPENSE;
        $this->name = $name;
    }
}