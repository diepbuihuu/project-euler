<?php

$sum = "0";

for ($i = 1; $i <= 1000; $i++) {
    $sum = bcadd($sum, bcpow($i, $i));
}

echo substr($sum, -10);
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
