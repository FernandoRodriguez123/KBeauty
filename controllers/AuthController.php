<?php
require_once __DIR__ . '/../models/UserModel.php';

class AuthController
{
    public function register($name, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if (UserModel::register($name, $email, $hashedPassword)) {
            return true;
        } else {
            return false;
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = UserModel::login($email);

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user'] = $user;
                header('Location: index.php');
                return true;
            } else {
                return false;
            }
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: login.php');
    }

    public function borrar()
    {
        $userId = $_SESSION['user']['id'];
        $result = UserModel::borrarCuenta($userId);

        if ($result) {
            header('Location: logout.php');
        }
    }

    public function guardarPerfil($name, $email, $password = null)
    {
        $userId = $_SESSION['user']['id'];

        if ($password) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $result = UserModel::actualizarPerfil($userId, $name, $email, $hashedPassword);
        } else {
            $result = UserModel::actualizarPerfil($userId, $name, $email, $password);
        }

        if ($result) {
            $_SESSION['user']['name'] = $name;
            $_SESSION['user']['email'] = $email;
            header('Location: perfil.php');
            exit();
        } else {
            echo "Hubo un problema al guardar los cambios.";
        }
    }
}
