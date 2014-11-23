<?php

echo 145 + 40585; die;
$limit = 2540160;

$fac = array(1);


for ($i = 1; $i <= 9; $i ++) {
    $fac[$i] = $i * $fac[$i - 1];
}

for ($i = 10; $i <= $limit; $i++) {
    if (digitFactory($i, $fac)){
        echo $i . '<br/>';
    }
}

function digitFactory($number, $fac) {
    $sumDiFac = 0;
    $tmp = $number;
    
    while ($tmp != 0) {
        $remain = $tmp % 10;
        $sumDiFac += $fac[$remain];
        $tmp = intval($tmp/10);
    }
    if ($number === $sumDiFac) {
        return true;
    } else {
        return false;
    }
}
