<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Connection {
    private static $host = "localhost";
    private static $dbname = "Eterna";
    private static $username = "root";
    private static $password = "root";

    private static $charset = "utf8mb4";
    private static $pdo = null;

    public static function getConnection() {
        if (self::$pdo) {
            return self::$pdo;
        }

        $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=" . self::$charset;

        try {
            self::$pdo = new PDO($dsn, self::$username, self::$password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }

        return self::$pdo;
    }

    public static function closeConnection() {
        self::$pdo = null;
        return true;
    }
}
?>
