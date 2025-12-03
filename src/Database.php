<?php

class Database {
    private $host = "127.0.0.1";
    private $db   = "produk_crud"; 
    private $user = "root";
    private $pass = "123";
    private $charset = "utf8mb4";

    public function getConnection() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            return new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
        
            die("Koneksi DB gagal: " . $e->getMessage());
        }
    }
}
