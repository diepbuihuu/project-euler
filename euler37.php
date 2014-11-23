<?php

$max = 1000000;
//$max = 100000;
$euler = new Euler();
//var_dump($euler->getRotation(array(1,1,9,3))); die;
$euler->buildPrimesList($max);
$euler->getTruncatePrime();
//echo $euler->isPrime(1139);

class Euler {
    private $primes;
    private $count;
    
    public function __construct() {
        $this->primes = array(2 => 1); 
        $this->count = 1;
    }
    
    public function getTruncatePrime() {
        $all = array();
        foreach ($this->primes as $primes => $v) {
            if ($primes < 10) {
                continue;
            }
            $rotations = $this->getTruncate($primes);
            foreach ($rotations as $number) {
                $flag = true;
                if (!isset($this->primes[$number])) {
                    $flag = false;
                    break;
                }
            }
            if ($flag) {
                echo $primes . '<br/>'; 
                $all[] = $primes;
            }
        }
        echo array_sum($all);
    }

    
    function getTruncate($number) {
        $char = str_split($number);
        if (count($char) <= 1) {
            return $char;
        }
        
        $truncates = array();
        $length = count($char);
        for ($i = 1; $i < $length; $i++) {
            $firstGroup = array_slice($char, 0, $i);
            $lastGroup = array_slice($char, $i, $length - $i);
            $truncates[] = implode('', $firstGroup);
            $truncates[] = implode('', $lastGroup);
        }
        

        return array_unique($truncates);
        
    }
    
    function buildPrimesList($max) {
        $i = 3;
        while (true) {    
            if ($i >= $max) {
                break;
            }
            if ($this->isPrime($i)) {
                $this->primes[$i] = 1;
                $this->count ++;
            }
            $i += 2;
        }
//        echo count($this->primes);
    }
    

    public function isPrime($number) {
        if (isset($this->primes[$number])) {
            return true;
        }
        $max = sqrt($number);
        foreach ($this->primes as $prime => $v) {
            if ($prime > $max) {
                return true;
            }
            if ($number % $prime === 0) {
                return false;
            }
        }
    }
}
