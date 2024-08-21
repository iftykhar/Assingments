<?php

namespace App\Storage;

interface StorageInterface{
    public function userExists($username);
    public function saveUser($username,$password, $role);
    public function getUser($username);
}





?>