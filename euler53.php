<?php

$limit = 1000000;

echo numSelection(23, $limit);
echo '<br/>';

$numSelection = 0;
for ($i = 23; $i <= 100; $i ++) {
    $numSelection += numSelection($i, $limit);
}
echo $numSelection;

function numSelection($n, $minFilter) {
    $selection = 1;
    for ($i = 1; $i <= $n/2; $i ++) {
        $selection = $selection * ($n-$i+1)/$i;
        if ($selection > $minFilter) {
            return $n + 1 - 2 * $i;
        }
    }
    return 0;
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
