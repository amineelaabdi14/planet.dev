<?php

class Dbh
{
    private static string $dbHost = "localhost";
    private static string $dbName = "planet_dev";
    private static string $dbUsername = "root";
    private static string $dbPassword = "";

    private static $connection = null;


    public static function connect()
    {
        if (self::$connection == null) {
            try {
                self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName, self::$dbUsername, self::$dbPassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$connection;
    }

    public static function disconnect():void
    {
        self::$connection = null;
    }

}