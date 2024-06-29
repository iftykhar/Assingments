<?php
require_once './stricttype.php';

// class Category implements Model{
    
//     protected string $name = '';
//     protected Transfertype $type;

//     public static function getModelName(): string{

//         return 'categories';
//     }

//     public function getName(): string{
        
//         return $this->name;
//     }

//     public function setName(string $name): void{

//         $this->name = $name;
//     }

//     public function getType(): TransferType{

//         return $this->type;
//     }

//     public function setType(TransferType $type): void{

//         $this->type = $type;
//     }

    
// }
class Category implements Model {
    
    protected string $name = '';
    protected Transfertype $type;

    public static function getModelName(): string {
        return 'categories';
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getType(): TransferType {
        return $this->type;
    }

    public function setType(TransferType $type): void {
        $this->type = $type;
    }
}