<?php
class Controller
{

    public function loadModel($modelName)
    {
        include_once "model/Model.class.php";
        include_once "model/$modelName.class.php";
        return new $modelName;
    }

    public function loadView($viewName, $data = [])
    {
        foreach ($data as $var => $value) {
            $$var = $value;
        }
        include_once "view/$viewName.php";
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
}
