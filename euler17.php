<?php
$chars = array ('one','two','three','four','five','six','seven','eight','nine');
$f10t19 = array('ten','eleven','twelve','thirteen','fourteen','fifteen','sixteen','seventeen','eighteen','nineteen');
$f20t90 = array('twenty','thirty','forty','fifty','sixty','seventy','eighty','ninety');

$count1_9 = 0;
foreach ($chars as $char) {
    $count1_9 += strlen($char);
}
echo $count1_9 . '<br/>';

$count10_19 = 0;
foreach ($f10t19 as $char) {
    $count10_19 += strlen($char);
}

echo $count10_19 . '<br/>';

$count1_99 = $count1_9 + $count10_19;
foreach ($f20t90 as $char) {
    $count1_99 += strlen($char); // twenty, thirty ...
    $count1_99 += 9 * strlen($char) + $count1_9;
}

echo $count1_99 . '<br/>';

$count1_999 = $count1_99;
foreach($chars as $char) {
    $count1_999 += (strlen($char) + strlen('hundred')); // one hundred, two hundred ...
    $count1_999 += 99 * (strlen($char) + strlen('hundred') + strlen('and')) + $count1_99;
}

echo $count1_999 . '<br/>';

$count1000 = strlen('one') + strlen('thousand');

echo $count1000 + $count1_999;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
