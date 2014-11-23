<?php

$max = 1000000;
//$max = 10000;
$euler = new Euler();
//var_dump($euler->getRotation(array(1,1,9,3))); die;
$euler->buildPrimesList($max);
$euler->getRotationPrime();
//echo $euler->isPrime(1139);

class Euler {
    private $primes;
    private $count;
    
    public function __construct() {
        $this->primes = array(2 => 1); 
        $this->count = 1;
    }
    
    public function getRotationPrime() {
        $all = array();
        foreach ($this->primes as $primes => $v) {
            $rotations = $this->getRotation(str_split($primes));
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
        echo count($all);
    }
    
    function getRotation($char) {
//        $char = str_split($number);
        if (count($char) <= 1) {
            return $char;
        }
        
        $rotations = array();
        
        for ($i = 0; $i < count($char); $i++) {
            $firstElement = array_splice($char, 0, 1);
            $char[] = $firstElement[0];
            $rotations[] = implode('', $char);
        }
        
//        foreach ($rotations as $key => $value) {
//            $rotations[$key] = intval($value);
//        }
        
        return array_unique($rotations);
        
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
