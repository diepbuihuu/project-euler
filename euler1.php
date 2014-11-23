<?php
$max = 1000;
$result = 0;

for ($i = 1; $i < $max; $i++) {
    if ($i%3 === 0 || $i%5 === 0) {
        $result += $i;
    }
}
echo $result;
