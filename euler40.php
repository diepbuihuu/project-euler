<?php

$max = 1000000;

$str = "";

for ($i = 0; $i < $max; $i ++) {
    $str .= $i;
    if (strlen($str) > $max) {
        break;
    }
}

$result = 1;

for ($i = 0; $i <= 6; $i ++) {
    $char = $str[pow(10, $i)];
    echo $char;
    $result *= intval($char);
}

echo '<br/>';
echo $result;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
