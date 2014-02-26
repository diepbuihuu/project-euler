<?php

$result = array();

for ($i = 2; $i <= 100; $i++) {
    for ($j = 2; $j <= 100; $j++) {
        $result[] = pow($i, $j);
    }
}

echo count(array_unique($result));
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
