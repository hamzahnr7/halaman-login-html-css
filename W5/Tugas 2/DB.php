<?php

class DB {

    protected $hostname = 'localhost';
    protected $user = 'root';
    protected $pass = '';
    protected $dbname = 'pelatihan-php';

    public function connection()
    {
        try {
            // Membuat koneksi
            $conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->user, $this->pass);
        
            // Menentukan mode error
            // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            // Jika koneksi berhasil, lakukan operasi database lainnya...
            print_r($conn);
        
            // Menutup koneksi
            $conn = null;
        } catch(PDOException $e) {
            // Menampilkan pesan kesalahan jika koneksi gagal
            die("Koneksi gagal: " . $e->getMessage());
        }
    }
}