<?php
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

class Database
{

    /* --- METHODS --- */

    public function connectPDO()
    {
        $DB_Host = $_ENV['DB_HOST'];
        $DB_User = $_ENV['DB_USER'];
        $DB_Cred = $_ENV['DB_CRED'];
        $DB_Name = $_ENV['DB_NAME'];

        try {
            $Connection = new PDO("mysql:host={$DB_Host};dbname={$DB_Name}", $DB_User, $DB_Cred);
            $Connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $Connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit();
        }

        return $Connection;
    }

}
