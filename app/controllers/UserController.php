<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $email = $_POST['email'];

            if ($this->userModel->register($username, $password, $firstName, $lastName, $email)) {
                header('Location: /login');
                exit;
            } else {
                echo "Regisztráció sikertelen.";
            }
        }
        require __DIR__ . '/../views/register.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->login($username, $password);

            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                header('Location: /message-wall');
                exit;
            } else {
                echo "Hibás felhasználónév vagy jelszó.";
            }
        }
        require __DIR__ . '/../views/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /login');
        exit;
    }
}
