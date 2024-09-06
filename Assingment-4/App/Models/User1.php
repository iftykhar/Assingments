<?php

// namespace App\Models;

// use App\Storage\StorageInterface;

// class User{
//     private $storage;
//     public $username;
//     public $password;
//     public $role;
//     public $id;
//     public $name;
//     public $email;
//     public $balance;


//     public function __construct(StorageInterface $storage, $username = '', $password = '', $role = '')
//     {
//         $this->storage = $storage;
//         $this->username = $username;
//         $this->password = $password;
//         $this->role = $role;
//     }

//     public function register(){
//         if($this->storage->userExists($this->username)){
//             return false;
//         }

//         $this->storage->saveUser($this->username,$this->password, $this->role);
//         return true;
//     }

//     public function login(){
//         $user = $this->storage->getUser($this->username);

//         if(!$user){
//             return false;
//         }
//         if(password_verify($this->password, $user['password'])){
//             $this->role = $user['role'];
//             return true;
//         }

//         return false;
//     }
// }