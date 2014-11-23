<?php

$sum = bcpow(2, 1000);

$result = 0;
for ($i = 0; $i < strlen($sum); $i++) {
    $result += intval($sum[$i]);
}

echo $result;

