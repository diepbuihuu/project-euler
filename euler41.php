<?php


$max = 8000000;
$euler = new Euler();
$euler->buildPrimesList($max);
echo $euler->getLargestPandigital();

class Euler {
    private $primes;
    private $count;
    
    public function __construct() {
        $this->primes = array(2); 
        $this->count = 1;
    }
    
    function getLargestPandigital() {
        $length = count($this->primes);
        for ($i = $length - 1; $i >= 0; $i --) {
            if ($this->pandigital($this->primes[$i])) {
                return $this->primes[$i];
            }
        }
        return 1;
    }
    
    function pandigital ($number) {
        $chars = str_split($number);
        sort($chars);
        $length = count ($chars);

        for ($i = 0; $i < $length; $i ++) {
            if (intval($chars[$i]) !== $i + 1) {
                return false;
            }       
        }
        return true;
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
