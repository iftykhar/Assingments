<?php 
require_once './stricttype.php';

class Income extends Transaction{

    public function __construct(){
        
        $this->type = TransferType::INCOME;
    }
}