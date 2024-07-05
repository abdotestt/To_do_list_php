<?php

namespace controllers;

use body\Controller;
use Models\User;

class UserController extends Controller {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ];
            $this->userModel->createUser($data);
            header('Location: /index.php?controller=user&action=login');
        } else {
            $this->loadView('user/register');
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->userModel->getUserById($_POST['id']);

        } else {
            $this->loadView('user/login');
        }
    }

    // Add other necessary methods
}
