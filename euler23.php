<?php

define('ABUNDANT_LIMIT', 28123);
//define('ABUNDANT_LIMIT', 1000);


$startTime = time();
$numbers = new Numbers();
$numbers->getAllAbundant(ABUNDANT_LIMIT);
$abundant = $numbers->getAbundantSum();
$key = array_keys($abundant);
$sumAbundant = array_sum($key);
echo ABUNDANT_LIMIT * (ABUNDANT_LIMIT + 1) / 2 - $sumAbundant;

echo '<br/>';
echo "Time expand: " . (time() - $startTime);

//var_dump($numbers->checkAbundant(12));
//var_dump($numbers->checkAbundant(23));
//var_dump($numbers->checkAbundant(28123));

class Numbers {
    private $analyze;
    private $abundant;
    private $abundantSum;
    
    public function __construct() {
        $this->analyze = array();
        $this->abundant = array();
        $this->abundantSum = array();
    }
    
    public function getAbundantSum() {
        foreach ($this->abundant as $k1 => $v1) {
            foreach ($this->abundant as $k2 => $v2) {
                if ($k2 < $k1) {
                    continue;
                }
                if ($k1 + $k2 > ABUNDANT_LIMIT) {
                    break;
                }
                if (!isset($this->abundantSum[$k1 + $k2])) {
                    $this->abundantSum[$k1 + $k2] = 1;
                }
            }
        }
        return $this->abundantSum;
    }
    
    public function getAllAbundant($limit) {
        for ($i = 1; $i <= $limit; $i++) {
            $this->checkAbundant($i);
        }
        unset($this->analyze);
        ksort($this->abundant);
        return $this->abundant;
    }

    public function checkAbundant($number) {
        if (isset($this->abundant[$number])) {
            return true;
        } 
        
        $analyze = $this->analyze($number);
        $sumDivisor = 1;
        foreach ($analyze as $base => $pow) {
            $sumDivisor *= ((pow($base,$pow+1) - 1)/($base - 1));
        }
        if ($sumDivisor > 2 * $number) {
            for ($i = $number; $i <= ABUNDANT_LIMIT; $i += $number) {
                $this->abundant[$i] = 1;
            }
            return true;
        }
        return false;
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

function getProperDivisors ($number) {
    $limit = sqrt($number);
    for ($i = 1; $i <= $limit; $i++) {
        
    }
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
