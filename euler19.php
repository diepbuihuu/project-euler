<?php

$dayIn1900 = dayInYear(1900);
$remain = $dayIn1900 % 7;
$countSunday = 0;
for ($y = 1901; $y <= 2000; $y++) {
    for ($m = 1; $m <= 12; $m++) {
        if ($remain === 6) {
            $countSunday++;
        }
        $days = dayInMonth($m, $y);
        $remain = ($remain + $days) % 7;
    }
}
echo $countSunday;

function dayInYear($year) {
    if (isLeap($year)) {
        return 366;
    } else {
        return 365;
    }
}

function isLeap($year) {
    if ($year % 400 === 0) {
        return true;
    } else if ($year % 100 === 0) {
        return false;
    } else if ($year % 4 === 0) {
        return true;
    } else {
        return false;
    }
}

function dayInMonth($mon, $year = 1900) {
    switch ($mon) {
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            return 31;
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            return 30;
            break;
        case 2:
            if (isLeap($year)) {
                return 29;
            } else {
                return 28;
            }
            break;
        default :
            return 30;
    }
}
