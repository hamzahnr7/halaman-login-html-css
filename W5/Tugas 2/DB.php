<?php

class DB {

    protected $hostname = 'localhost';
    protected $user = 'root';
    protected $pass = '';
    protected $dbname = 'pelatihan-php';
    protected $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
        } catch(PDOException $e) {
            die("Koneksi gagal: " . $e->getMessage());
        }
    }
    public function closeConnection() {
        $this->conn = null;
    }
    public function getDataPegawai()
    {
        $sql = "SELECT * FROM pegawai";
        $result = $this->conn->query($sql);

        if ($result) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo "Error: " . $this->conn->errorInfo()[2];
            return false;
        }
    }
    public function insertData($tableName, $data) {
        try {
            $placeholders = array();
            $values = array();
            foreach ($data as $key => $value) {
                $placeholders[] = ':' . $key;
                $values[':' . $key] = $value;
            }

            $sql = "INSERT INTO $tableName (" . implode(', ', array_keys($data)) . ") VALUES (" . implode(', ', $placeholders) . ")";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($values);

            echo "Data berhasil ditambahkan ke tabel $tableName.";
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function updateData($tableName, $data, $condition) {
        try {
            $setClause = array();
            $values = array();
            foreach ($data as $key => $value) {
                $setClause[] = $key . ' = :' . $key;
                $values[':' . $key] = $value;
            }
            $sql = "UPDATE $tableName SET " . implode(', ', $setClause) . " WHERE id=$condition";

            $result = $this->conn->prepare($sql);
            $result->execute($values);

            echo "Data berhasil diperbarui pada tabel $tableName.";
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function createTable($tableName, $columns) {
        try {
            $sql = "CREATE TABLE $tableName ($columns)";

            $this->conn->exec($sql);

            echo "Tabel $tableName telah berhasil dibuat.";
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getColumnNames($tableName) {
        try {
            $sql = "SHOW COLUMNS FROM $tableName";

            $result = $this->conn->query($sql);
            $columns = $result->fetchAll(PDO::FETCH_COLUMN);

            return $columns;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}