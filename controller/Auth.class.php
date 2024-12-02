<?php

class Auth extends Controller
{
    public function index() {
        $this->loadView('login');
    }

    public function register() {
        $this->loadView('register');
    }

    public function login()
    {
        session_start();
        $userModel = $this->loadModel("users");
        $error_message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $userModel->findByUsername($username);

            if ($user && password_verify($password, $user['userpass'])) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['is_admin'] = $user['is_admin'];

                $redirect = $user['is_admin'] ? "/view/admin/dashboard" : "/index.php";
                header('Location' . $redirect);
                exit();
            } else {
                $error_message = "Username or Password is Incorrect!";
            }
        }
        this->loadView('login', ['error_message'=> $error_message]);
    }

    public function registerSubmit()
    {
        session_start();
        $error_message = '';
        $success_message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if ($password !== $confirm_password) {
                $error_message = 'Password did not match!';
            } else {
                $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
                
            }
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: index.php?c=Auth&m=login');
        exit();
    }
}

?>