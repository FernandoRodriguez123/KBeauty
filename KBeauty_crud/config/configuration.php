<?php
// Incluimos el archivo Database.php
require_once __DIR__ . '/database.php';

// Comprobamos si la tabla 'users' existe, y si no, la creamos
if (!Database::checkUsersTableExists()) {
    Database::createUsersTable();
}
?>
