<?php

$time = time();
$euler = new Euler();

for ($num1 = 1001; $num1 <= 9999; $num1 += 2) {
    if (!$euler->isPrime($num1)) {
        continue;
    }
    // $inc mean increase amount
    $maxInc = (9999 - $num1) / 2;
    for ($inc = 2; $inc <= $maxInc; $inc ++) {
        $num2 = $num1 + $inc;
        if (!$euler->isPrime($num2) || !$euler->isPermuation($num1, $num2)) {
            continue;
        }
        $num3 = $num2 + $inc;
        if (!$euler->isPrime($num3) || !$euler->isPermuation($num1, $num3)) {
            continue;
        }
        echo $num1.$num2.$num3.'<br/>';
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
        return false;
        $charSet = $this->getCharSet($number);
        for ($i = 0; $i < count($charSet) - 1; $i ++) {
            if ($charSet[$i] === $charSet[$i+1]) {
                return true;
            }
        }
        return false;
    }
    
}
