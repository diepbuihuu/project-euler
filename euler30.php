<?php

$max = 354294;

//echo fithPower(32);
$all = array();

for ($i = 2; $i <= $max; $i ++) {
    if ($i === fithPower($i)) {
        $all[] = $i;
        echo $i;
        echo '<br/>';
    }
}

echo array_sum($all);

function fithPower($number) {
    $result = 0;
    while ($number !== 0) {
        $lastCharacter = $number % 10;
        $result += pow($lastCharacter, 5);
        $number = intval($number/10);
    }
    return $result;
    
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
