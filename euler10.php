<?php

$max = 2000000;
$euler = new Euler();
$euler->buildPrimesList($max);
echo $euler->sumPrime();

class Euler {
    private $primes;
    private $count;
    
    public function __construct() {
        $this->primes = array(2); 
        $this->count = 1;
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
    
    function getPrime($position) {
        return $this->primes[$position-1];
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
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
