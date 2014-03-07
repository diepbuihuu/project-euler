<?php

// get 5 character family
    // last character
for ($last = 1; $last <= 9; $last += 2) {
    for ($first = 1; $first <= 9; $first++) {
        $family = new Family (array(2,3,4), array(1=>$first, 5=>$last), 5);
        printFamily($family);   
    }
    for ($i = 0; $i <= 9; $i ++) {
        $family = new Family (array(1,3,4), array(2=>$i, 5=>$last), 5);
        printFamily($family);
        $family = new Family (array(2,1,4), array(3=>$i, 5=>$last), 5);
        printFamily($family);
        $family = new Family (array(2,3,1), array(4=>$i, 5=>$last), 5);
        printFamily($family);
    }
    
    // 6 character
    for ($first = 1; $first <= 9; $first++) {
        for ($i = 0; $i <= 9; $i ++) {
            $family = new Family (array(2,3,4), array(1=>$first, 5=>$i, 6=>$last), 6);
            printFamily($family);  
            $family = new Family (array(2,3,5), array(1=>$first, 4=>$i, 6=>$last), 6);
            printFamily($family);  
            $family = new Family (array(2,5,4), array(1=>$first, 3=>$i, 6=>$last), 6);
            printFamily($family);  
            $family = new Family (array(5,3,4), array(1=>$first, 2=>$i, 6=>$last), 6);
            printFamily($family);  
        }
    }
    
    for ($i = 0; $i <= 9; $i ++) {
        for ($j = 0; $j <= 9; $j ++) {
            $family = new Family (array(1,2,3), array(4=>$i, 5=>$j, 6=>$last), 6);
            printFamily($family);
            $family = new Family (array(1,2,4), array(3=>$i, 5=>$j, 6=>$last), 6);
            printFamily($family);
            $family = new Family (array(2,3,1), array(2=>$i, 5=>$j, 6=>$last), 6);
            printFamily($family);
            $family = new Family (array(1,2,5), array(3=>$i, 4=>$j, 6=>$last), 6);
            printFamily($family);
            $family = new Family (array(1,3,5), array(2=>$i, 4=>$j, 6=>$last), 6);
            printFamily($family);
            $family = new Family (array(1,4,5), array(2=>$i, 3=>$j, 6=>$last), 6);
            printFamily($family);
        }
    }
}
echo 123;

function printFamily($family) {
    $members = $family->getMember();
    $familyHead = checkPrimeFamily($members);
    if ($familyHead !== 0) {
        echo $familyHead . '<br/>';
    }
}


class Family {
    private $replacePart; // array (2,3,4);
    private $other;       // array (1 => 1, 5 => 9);
    private $length;
    
    public function __construct($replace, $other, $length) {
        $this->replacePart = $replace;
        $this->other = $other;
        $this->length = $length;
    }
    
    public function getMember() {
        $otherValue = 0;
        foreach ($this->other as $pos => $value) {
            $otherValue += $value * pow(10, $this->length - $pos);
        }
        
        $replaceUnit = 0;
        foreach ($this->replacePart as $pos) {
            $replaceUnit += pow(10, $this->length - $pos);
        }
        
        if (isset($this->other[1])) {
            $result = array($otherValue);
        } else {
            $result = array();
        }
        
        for ($i = 1; $i <= 9; $i++) {
            $result[] = $otherValue + $i * $replaceUnit;
        }
        return $result;
    }
}

function checkPrimeFamily($members) {
    $numMember = count($members);
    $nonPrimeNumber = 0;
    $expectPrimeNumber = 8;
    $candidate = 0;
    foreach ($members as $number) {
        if (isPrime($number)) {
            if ($candidate === 0) {
                $candidate = $number;
            }
        } else {
            $nonPrimeNumber ++;
            if ($numMember - $nonPrimeNumber < $expectPrimeNumber) {
                return 0;
            }
        }
    }
    return $candidate;
}

function isPrime($number) {
    $max = sqrt($number);
    
    if ($number % 2 === 0 && $number != 2) {
        return false;
    }
    if ($number % 3 === 0 && $number != 3) {
        return false;
    }
    
    for ($i = 5; $i <= $max; $i += 2) {
        if ($number % $i === 0) {
            return false;
        }
        $i = $i + 2;
        if ($i <= $max && $number % $i === 0){
            return false;
        }
        $i = $i + 2;
    }
    
    return true;
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
