<?php

$time = time();
$euler = new Euler();

//echo $euler->otherGoldbach(137);

for ($i = 35; $i < 100000; $i += 2) {
    if (!$euler->otherGoldbach($i)) {
        echo $i;
        break;
    }
}

echo '<br/>';
echo "Time expand: " . (time() - $time) . 's';

class Euler {
    private $primes;
    
    public function __construct() {
        $this->primes = array(FALSE,FALSE);
    }
    
    function isPrime($number) {
        if (isset($this->primes[$number])) {
            return $this->primes[$number];
        }
        $limit = sqrt($number);
        if ($number % 2 === 0 && $number !== 2) {
            $this->primes[$number] = FALSE;
            return false;
        }
        for ($i = 3; $i <= $limit; $i+=2) {
            if ($number % $i === 0) {
                $this->primes[$number] = FALSE;
                return false;
            }
        }
        $this->primes[$number] = true;
        return true;
    }
    
    function otherGoldbach ($number) {
        $limit = sqrt($number);

        for ($i = 0; $i <= $limit; $i++) {
            $remain = $number - 2 * $i * $i;
//            echo $remain . ' ';
            if ($this->isPrime($remain)) {
                return true;
            }
            if ($remain < 0) {
                return false;
            }
        }
        return true;
    }
}



/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
