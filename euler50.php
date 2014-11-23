<?php

$max = 1000000;
$euler = new Euler();
$euler->buildPrimesList($max);
$maxSeq = $euler->getLongestSequence($max);

for ($i = $maxSeq; $i >= 1; $i --) {
    $greatestPrime = $euler->getGreatest($i);
    if ( $greatestPrime !== 0) {
        echo $greatestPrime . ' ' . $i;
        return;
    }
}

class Euler {
    private $primes;
    private $count;
    private $longest;
    
    public function __construct() {
        $this->primes = array(2); 
        $this->count = 1;
        $this->longest = 0;
    }
    
    // get  number that canbe analyze isto sequence size $size
    function getGreatest($size) {
        $result = 0;
        for ($i = $this->longest - 1; $i >= $this->longest - $size; $i--) {
            $result += $this->primes[$i];
        }
        if ($this->isPrime($result)) {
            return $result;
        }
        
        $sequenceNumber = 1;
        while ($this->longest - $size - $sequenceNumber >= 0) {
            $oldElement = $this->primes[$this->longest-$sequenceNumber];
            $newElement = $this->primes[$this->longest-$sequenceNumber - $size];
            $result = $result - $oldElement + $newElement;
            if ($this->isPrime($result)) {
                return $result;
            }
            $sequenceNumber ++;
        }
        
        return 0;
        
    }
    
    // any sequence with size >= x will has value > $max;
    function getLongestSequence($max) {
        $x = 0;
        $sum = 0;
        
        while($sum <= $max) {
            $sum += $this->primes[$x];
            $x++;
        }
        
        $this->longest = $x - 1;
        return $x - 1;
    }
    
    function buildPrimesList($max) {
        $i = 3;
        while (true) {    
            if ($i >= $max) {
                break;
            }
            if ($this->isPrime($i)) {
                array_push($this->primes, $i);
                $this->count ++;
            }
            $i += 2;
        }
    }
    
    function sumPrime() {
        return array_sum($this->primes);
    }
    

    public function isPrime($number) {
        $max = sqrt($number);
        foreach ($this->primes as $prime) {
            if ($prime > $max) {
                return true;
            }
            if ($number % $prime === 0) {
                return false;
            }
        }
    }
}
