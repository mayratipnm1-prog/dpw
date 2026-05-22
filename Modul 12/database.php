<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $paswd = "";
    private $name = "db_praktik";
    public $con;

    public function __construct() {
        $this->con = new mysqli($this->host, $this->user, $this->paswd, $this->name);
        if ($this->con->connect_error) {
            die("Koneksi Database Gagal: " . $this->con->connect_error);
        }
    }

    public function getConnection() {
        return $this->con;
    }

    public function createTable($tableName, $sqlColumns) {
        $sql = "CREATE TABLE IF NOT EXISTS $tableName ($sqlColumns)";
        $result = $this->con->query($sql);

        if ($result === TRUE) {
            return "Tabel $tableName berhasil dibuat (atau sudah ada)";
        } else {
            return "Tabel $tableName gagal dibuat: " . $this->con->error;
        }
    }

    public function createTableLogin() {
        $sql = "CREATE TABLE IF NOT EXISTS t_login (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30) NOT NULL,
            password VARCHAR(50) NOT NULL,
            email VARCHAR(50),
            tgl_registrasi TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        $result = $this->con->query($sql);

        if ($result === TRUE) {
            return "Tabel t_login berhasil dibuat (atau sudah ada)";
        } else {
            return "Tabel t_login gagal dibuat: " . $this->con->error;
        }
    }

    public function closeConnection() {
        $this->con->close();
    }
}
?>