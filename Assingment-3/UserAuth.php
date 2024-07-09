<?php
class UserAuth {
    private $userDir = "file/";

    public function __construct() {
        if (!is_dir($this->userDir)) {
            mkdir($this->userDir, 0777, true);
        }
    }

    public function register($name, $email, $password, $confirm_password) {
        if (empty($email) || empty($password) || empty($confirm_password)) {
            return ["error" => "Please fill in all fields."];
        }

        if ($password !== $confirm_password) {
            return ["error" => "Passwords do not match."];
        }

        $userFile = $this->userDir . $email . ".txt";
        if (file_exists($userFile)) {
            return ["error" => "Email already registered."];
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        if (file_put_contents($userFile, $hashedPassword) !== false) {
            return ["success" => "Registration successful! You can now log in."];
        } else {
            return ["error" => "Failed to save user data."];
        }
    }

    public function login($email, $password) {
        if (empty($email) || empty($password)) {
            return ["error" => "Please fill in all fields."];
        }

        $userFile = $this->userDir . $email . ".txt";
        if (!file_exists($userFile)) {
            return ["error" => "Username does not exist."];
        }

        $storedPassword = file_get_contents($userFile);
        if (password_verify($password, $storedPassword)) {
            $_SESSION["email"] = $email;
            return ["success" => "Login successful."];
        } else {
            return ["error" => "Incorrect password."];
        }
    }
}
?>
