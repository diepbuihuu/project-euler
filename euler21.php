<?php

$allResult = ' (220, 284), (1184, 1210), (2620, 2924), (5020, 5564), (6232, 6368)';

$numbers = preg_split('/[^0-9]+/', $allResult, -1, PREG_SPLIT_NO_EMPTY);

$result = 0;
foreach ($numbers as $number) {
    $result += intval($number);
}
echo $result;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
