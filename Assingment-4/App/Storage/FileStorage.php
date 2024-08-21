<?php

namespace App\Storage;

class FileStorage implements StorageInterface{

    private $storage_dir = '../Data/Users';

    public function __construct()
    {
        if(!file_exists($this->storage_dir)){
            mkdir($this->storage_dir, 0777, true);
        }
    }

    private function getUserFilePath($username){
        return $this->storage_dir.$username.'.txt';
    }

    public function userExists($username)
    {
        return file_exists($this->getUserFilePath($username));
    }

    public function saveUser($username, $password, $role)
    {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $user_data = $username . "\n" . $hashed_password . "\n" . $role;

        file_put_contents($this->getUserFilePath($username), $user_data);
    }

    public function getUser($username){
        if($this->userExists($username)){
            return null;
        }

        $user_data = file($this->getUserFilePath($username), FILE_IGNORE_NEW_LINES);
        return [
            'username' => $user_data[0],
            'password' => $user_data[1],
            'role' => $user_data[2]
        ];
    }

}


?>