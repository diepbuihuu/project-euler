<?php

    $number = new Numbers();
    
    for ($i = 1; $i < 1000000; $i++) {
        if ($number->numPrimeFactor($i) === 4 && $number->numPrimeFactor($i + 1) === 4
                && $number->numPrimeFactor($i + 2) === 4 && $number->numPrimeFactor($i + 3) === 4) {
            echo $i;
            return;
        }
    }

class Numbers {
    private $analyze;
    
    public function __construct() {
        $this->analyze = array();
    }
    
    public function numPrimeFactor($number) {
        return count($this->analyze($number));
    }
       
    public function analyze ($number) {
        if (isset($this->analyze[$number])) {
            return $this->analyze[$number];
        }
        if ($number === 1) {
            return array();
        }
        
        $smDi = $this->getSmallestDivisor($number);
        $analyze = $this->analyze($number/$smDi);
        if (isset($analyze[$smDi])) {
            $analyze[$smDi] += 1;
        } else {
            $analyze[$smDi] = 1;
        }
        $this->analyze[$number] = $analyze;
        return $analyze;
        
    }
    
    function getSmallestDivisor ($number) {
        if ($number <= 1) {
            echo $number; die;
        }
        if ($number % 2 === 0) {
            return 2;
        }
        
        $limit = sqrt($number);
        for ($i = 3; $i <= $limit; $i += 2) {
            if ($number % $i === 0) {
                return $i;
            }
        }
        return $number;
    }
}
