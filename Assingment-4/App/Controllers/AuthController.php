<?php
namespace App\Controllers\AuthControllers;

use App\Storage\StorageInterface;
use App\Models\User;

class AuthController {
    private $storage;

    public function __construct(StorageInterface $storage) {
        $this->storage = $storage;
    }

    public function register($name, $email, $password) {
        $user = new User(uniqid(), $name, $email, $password);
        $this->storage->saveUser($user);
        echo "Registration successful!";
    }

    public function login($email, $password) {
        $user = $this->storage->getUserByEmail($email);
        if ($user && $user->password === $password) {
            session_start();
            $_SESSION['user_id'] = $user->id;
            $_SESSION['role'] = $user->role;
            header("Location: /App/Views/Customer/dashboard.php");
        } else {
            echo "Invalid email or password";
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /Public/login.php");
    }
}
?>
