<?php
 require_once './stricttype.php';

class IncomeCategory extends Category{

    public function __construct(string $name=''){

        $this->type = TransferType::INCOME;
        $this->name = $name;
    }
} 