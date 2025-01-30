<?php
require_once __DIR__ . '/../config/database.php';

class UserModel
{
    public static function register($name, $email, $password)
    {
        try {
            $db = Database::connect();

            $stmt = $db->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);

            if ($stmt->rowCount() > 0) {
                return false;
            } else {
                $stmt = $db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");

                if ($stmt->execute([$name, $email, $password])) {
                    return true;
                }
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }

        return false;
    }

    public static function login($email)
    {
        $db = Database::connect();

        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return false;
        }

        return $user;
    }

    public static function borrarCuenta($userId)
    {
        try {
            $db = Database::connect();

            $stmt = $db->prepare("DELETE FROM users WHERE id = ?");
            $stmt->execute([$userId]);

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public static function actualizarPerfil($userId, $name, $email, $password = null)
    {
        try {
            $db = Database::connect();

            if ($password) {
                $stmt = $db->prepare("UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?");
                $stmt->execute([$name, $email, $password, $userId]);
            } else {
                $stmt = $db->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
                $stmt->execute([$name, $email, $userId]);
            }

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}
?>

