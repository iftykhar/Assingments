<?php
namespace App\Models;

class User {
    public $id;
    public $name;
    public $email;
    public $password;
    public $balance;
    public $role; // 'admin' and 'customer'

    public function __construct($id, $name, $email, $password, $balance = 0, $role = 'customer') {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->balance = $balance;
        $this->role = $role;
    }
}
?>
