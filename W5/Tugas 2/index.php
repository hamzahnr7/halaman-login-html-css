<?php

include 'Kalkulator.php';
include 'DB.php';

echo "Selamat Datang<br>";

$kalkulator = new Kalkulator();
$x = 3;
$y = 9;
echo 'X = '.$x.'; Y = '.$y.';<br>';
echo 'X + Y = '.$kalkulator->tambah($x,$y).'<br>';
echo '<br>';
echo 'X = '.$x.'; Y = '.$y.';<br>';
echo 'X - Y = '.$kalkulator->kurang($x,$y).'<br>';
echo '<br>';
echo 'X = '.$x.'; Y = '.$y.';<br>';
echo 'X * Y = '.$kalkulator->kali($x,$y).'<br>';
echo '<br>';
echo 'X = '.$x.'; Y = '.$y.';<br>';
echo 'X / Y = '.$kalkulator->bagi($x,$y).'<br>';
echo '<br>';
$db = new DB();

$result = $db->getDataPegawai();
$column = $db->getColumnNames('pegawai');
foreach ($result as $row => $col) {
    $thead[] = $result[$row];
    $data[] = implode("\n|\n", $col);
}
echo implode("\n|\n", $column).'<br>';
foreach ($data as $d ) {
    echo $d.'<br>';
}
