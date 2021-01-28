<?php
require_once 'app/Models/config.inc.php';
class Database 
{
    private static $dbHost = MYSQL_HOST;
    private static $dbUsername = MYSQL_BENUTZER;
    private static $dbUserPassword = MYSQL_KENNWORT;
    private static $dbName = MYSQL_DATENBANK;
    private static $pdo = null;

    public function __construct() 
    {
        exit('Init function is not allowed');
    }

    public static function connect() 
    {
        // One connection through whole application
        if (null == self::$pdo) {
            try 
            {
                // 'mysql:host=localhost;dbname=m133;charset=utf8', 'root', 'ibz12345$'
                self::$pdo = new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName . ";charset=utf8", self::$dbUsername, self::$dbUserPassword);
            } 
            catch (PDOException $e) 
            {
                die($e->getMessage());
            }
        }
        
        return self::$pdo;
    }

    public static function disconnect() 
    {
        self::$pdo = null;
    }
}
?>