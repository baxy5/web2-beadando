<?php

class Database {
    private $host = 'localhost';  
    private $db_name = 'web2';  
    private $username = 'web2'; 
    private $password = 'H_f[@Kh8(Rm6_mUr';      
    private $conn;

    public function connect() {
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
