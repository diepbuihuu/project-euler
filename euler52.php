<?php

$euler = new Euler();

for ($i = 123456; $i <= 165432; $i ++) {
    if ($euler->sixPermutation($i)) {
        echo $i . '<br/>';
        break;
    }
}

class Euler {
    private $primes;
    
    public function __construct() {
        $this->primes = array(FALSE,FALSE);
    }
    
    function sixPermutation($number) {
        if ($this->dubChar($number)) {
            return false;
        }
        for ($i = 2; $i <= 6; $i ++) {
            if (!$this->isPermuation($number, $number * $i)) {
                return false;
            }
        }
        return true;
    }
    
    function getCharSet($number) {
        $charSet = str_split($number);
        sort($charSet);
        return $charSet;
    }
    
    function isPermuation($num1, $num2) {
        $set1 = $this->getCharSet($num1);
        $set2 = $this->getCharSet($num2);
        if (count($set1) !== count($set2)) {
            return false;
        }
        for ($i = 0; $i < count($set1); $i++) {
            if ($set1[$i] !== $set2[$i]) {
                return false;
            }
        }
        return true;
    }

    function dubChar($number) {
        $charSet = $this->getCharSet($number);
        for ($i = 0; $i < count($charSet) - 1; $i ++) {
            if ($charSet[$i] === $charSet[$i+1]) {
                return true;
            }
        }
        return false;
    }
    
}

