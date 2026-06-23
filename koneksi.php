<?php
class Database {
    private $host = "localhost";
    private $username = "root"; 
    private $password = "";     
    private $database = "db_uas_pbo_trpl1b_tifanakhmadalfarikh"; // Nama database UAS
    public $conn;

    public function getConnection() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        
        if ($this->conn->connect_error) {
            die("Koneksi Database Gagal: " . $this->conn->connect_error);
        }
        
        return $this->conn;
    }
}
?>