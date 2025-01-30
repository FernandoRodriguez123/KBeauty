<?php
class Database
{
    private static $connection = null;
    private static $dbPath = __DIR__ . '/../database.db'; // Ruta al archivo de base de datos SQLite

    public static function connect()
    {
        // Si no hay conexión, se establece una nueva
        if (self::$connection === null) {
            try {
                // Establece la conexión con el archivo de base de datos SQLite
                self::$connection = new PDO('sqlite:' . self::$dbPath);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Si ocurre un error al conectar, se muestra un mensaje
                die("Connection failed: " . $e->getMessage());
            }
        }
        return self::$connection;
    }

    // Método para comprobar si la tabla "users" existe en la base de datos
    public static function checkUsersTableExists()
    {
        $db = self::connect();
        $result = $db->query("SELECT name FROM sqlite_master WHERE type='table' AND name='users';");
        $table = $result->fetch(PDO::FETCH_ASSOC);
        return $table ? true : false; // Retorna true si la tabla existe, false si no
    }

    // Método para crear la tabla "users" si no existe
    public static function createUsersTable()
    {
        $db = self::connect();
        $createQuery = "
            CREATE TABLE IF NOT EXISTS users (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL,
                email TEXT NOT NULL UNIQUE,
                password TEXT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );
        ";
        $db->exec($createQuery); // Ejecuta la consulta para crear la tabla si no existe
    }
}
