<?php

include 'Kalkulator.php';
include 'DB.php';

echo "Selamat Datang";

$kalkulator = new Kalkulator();

$jumlah = $kalkulator->tambah(1,2);

echo $jumlah;

$db = new DB();

$conn = $db->connection();

