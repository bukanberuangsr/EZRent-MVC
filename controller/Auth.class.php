<?php

class Auth extends Controller
{
    public function index() {
        $this->loadView('login');
    }

    public function register() {
        $this->loadView('register');
    }

    public function loginSubmit(): void
    {
        $username = addslashes($_POST['username']);
        $password = addslashes($_POST['password']);
        $authModel = $this->loadModel('AuthModel');
        $users = $authModel->findByUsername($username);

        if ($users->num_rows > 0) {
            $row = $users->fetch_assoc();
            if (password_verify($password, $row['userpass'])) {
                echo "<script>alert('Login berhasil!');</script>";
                $_SESSION['username'] = $row['username'];
            } else {
                echo "<script>alert('Password salah!');</script>";
            }
        } else {
            echo "<script>alert('Username tidak ditemukan!');</script>";
        }
        if (isset($_SESSION["username"]))
            echo "<script>window.location.href = '?c=Items';</script>";
        else
            echo "<script>window.location.href = '?=c=Auth';</script>";
    }

    public function registerSubmit()
    {
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

                $authModel = $this->loadModel('AuthModel');
                if ($authModel->insert($username, $hashed_pass)) {
                    $success_message = "Registration Successful!";
                    header('Location: index.php?c=Auth&m=index');
                    exit();
                } else {
                    $error_message = 'Registration failed!';
                }
            }
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: index.php?c=Auth');
        exit();
    }
}

?>