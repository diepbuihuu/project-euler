<?php

$max = 1000000;
//$max = 30;

$collatz = new Collatz ();

//echo getSequence(837799);die;
//echo $collatz->getSequenceLength(5);die;



//var_dump($collatz->getSequence(837799)); die;
//echo $collatz->strategy(16); die;
$maxValue = 1;
$maxIndex = 1;

for ($i = 1; $i < $max; $i ++) {
    $tmp = $collatz->getSequenceLength($i); 
    if ($tmp > $maxValue) {
        $maxValue = $tmp;
        $maxIndex = $i;
    }
}
echo $maxIndex . ' ' . $maxValue;
//echo $collatz->getLongestSequence();

//echo $collatz->getLongestSequence();

class Collatz {
    private $sequenceLength;
    public function __construct() {
        $this->sequenceLength = array();
    }
    
    
    function getSequence($index) {
        $result = array($index);
        while ($index !== 1) {
            if ($index % 2 === 0) {
                $index = $index/2;
            } else {
                $index = $index * 3 + 1;
            }
            $result[] = $index;
            if (isset($this->sequenceLength[$index])) {
                break;
            }
        }
        return $result;

    }
    
    
    function getSequenceLength($index) {
        $currentIndex = $index;
        if (isset($this->sequenceLength[$index])) {
            return $this->sequenceLength[$index];
        }
        if ($index === 1) {
            $this->sequenceLength[1] = 1;
            return 1;
        }
        
        $count = 1;
        while($index != 1) {
            if ($index % 2 === 0) {
                $index = $index/2;
            } else {
                $index = $index * 3 + 1;
            }
            if (isset($this->sequenceLength[$index])) {
                $result = $this->sequenceLength[$index] + $count;
                if ($currentIndex < 100000) {
                    $this->sequenceLength[$currentIndex] = $this->sequenceLength[$index] + $count;
                } 
                return $result;
            }
            $count ++;
        }
        return $count;
    }
}

