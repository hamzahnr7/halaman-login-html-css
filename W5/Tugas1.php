<?php
$data = <<<'EOD'
X, -9\\\10\100\-5\\\0\\\\, A
Y, \\13\\1\, B
Z, \\\5\\\-3\\2\\\800, C
EOD;
$rows = explode("\n", $data);
foreach ($rows as $row) {
    $cols = explode(", ", $row);
    $num[] = array_filter(explode('\\', $cols[1]), 'strlen');
    $xyz[] = $cols[0]; 
    $abc[] = $cols[2]; 
}
$value = array_merge(...$num);
sort($value); $count = array(0, 0, 0);
foreach ($value as $n) {
    for ($i=0; $i < 3; $i++) {
        foreach ($num[$i] as $key) {            
            if ($n == $key) {
                $count[$i]++;
                echo $xyz[$i].', '.$n.', '.$abc[$i].', '.$count[$i]."<br>";
            }
        } 
    }
}
// print_r($value);
// die(print_r($results));
// $pattern = "/-?\d+/"; // mendapatkan angka negatif
// $baris1 = substr($data, 0, strpos($data, 'A')+1);
// $baris2 = substr($data, strpos($data, 'A')+1, (strpos($data, 'B')+1) - strpos($data, 'A')+1);
// $baris3 = substr($data, strpos($data, 'B')+1, strpos($data, 'C')+1);

// preg_match_all($pattern, $data, $num);
// preg_match_all($pattern, $baris1, $num1);
// preg_match_all($pattern, $baris2, $num2);
// preg_match_all($pattern, $baris3, $num3);

// sort($num[0]);
// define('enter', '<br><br>');

// $tmp= array(0, 0, 0);
// foreach ($num[0] as $n) {
//     foreach ($num1[0] as $n1) {
//         if ($n == $n1) {
//             $tmp[0]++;
//             echo 'X, '. $n. ', A, '. $tmp[0]. enter;
//         };
//     };
//     foreach ($num2[0] as $n2) {
//         if ($n == $n2) {
//             $tmp[1]++;
//             echo 'Y, '. $n. ', B, '. $tmp[1]. enter;
//         };
//     };
//     foreach ($num3[0] as $n3) {
//         if ($n == $n3) {
//             $tmp[2]++;
//             echo 'Z, '. $n. ', C, '. $tmp[2]. enter;
//         };
//     };
// };
?>