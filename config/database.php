<?php

require_once __DIR__ . '/loadEnv.php';

class Database {
    private $host;
    private $db_name; 
    private $username;
    private $password;  
    private $conn;

    public function connect() {
        loadEnv(__DIR__ . '/../.env');

        $this->host = 'localhost';  
        $this->db_name = $_ENV['DB_NAME'];  
        $this->username = $_ENV['DB_USERNAME']; 
        $this->password = $_ENV['DB_PASS'];      

        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Adatbázis kapcsolat sikertelen: " . $e->getMessage();
        }

        return $this->conn;
    }
}
