<?php

$result = 0;
$start = 1;

for ($i = 1; $i <= 1001; $i += 2) {
    $diagonal = new Diagonal($i, $start);
    $result += $diagonal->getConnerSum();
    $start = $diagonal->getEnd() + 1;
}

echo $result;

class Diagonal {
    private $size;
    private $start;
    
    public function __construct($size, $start) {
        $this->size = $size;
        $this->start = $start;
      
    }
    
    public function getEnd() {
        if ($this->size === 1) {
            return $this->start;
        }
        return $this->start + ($this->size-1) * 4 - 1;
    }
    
    public function getConnerSum() {
        if ($this->size === 1) {
            return $this->start;
        }
        // corner 1;
        $c1 = $this->start + $this->size - 2;
        $c2 = $c1 + $this->size - 1;
        $c3 = $c2 + $this->size - 1;
        $c4 = $c3 + $this->size - 1;
        return $c1 + $c2 + $c3 + $c4;
        
    }
}
