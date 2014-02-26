<?php

$max = 100;

$number = factorial($max);

$result = 0;
for ($i = 0; $i < strlen($number); $i++) {
    $result += intval($number[$i]);
}

echo $result;

function factorial ($max) {
    $result = 1;
    for ($i = 1; $i <= $max; $i ++) {
        $result = bcmul($result, $i);
    }
    return $result;
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
