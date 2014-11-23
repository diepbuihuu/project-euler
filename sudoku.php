<?php

$matrix = "090000027
400200000
000370010
320000005
071000940
500000061
060034000
000005008
750000030";

$sudoku = new Sudoku($matrix);
$sudoku->solve();

class Sudoku {
    public $origin;
    private $candidates;
    
    public function printSudoku() {
        foreach ($this->origin as $line) {
            echo implode('', $line) . '<br/>';
        }
        echo '<br/>';
    }
    
    public function solve() {
        $this->optimize();
        $this->printSudoku();
//        return;
        if ($this->isValid()) {
            if ($this->solved()) {
                $this->printSudoku();
                return true;
            } else {
                $pos = $this->findNotEmpty();
                $i = $pos[0];
                $j = $pos[1];
                foreach ($this->candidates[$i][$j] as $candidate => $v) {
                    $tmp = $this->copy();
                    $tmp->origin[$i][$j] = $candidate;
                    $tmp->setCandidates($i, $j, $candidate);
                    echo $i.$j.$candidate.'<br/>';
                    if ($tmp->solve()) {
                        return true;
                    }
                }
                
            }
        } else {
            return false;
        }
        
    }
    
    function copy() {
        $newSudoku = new Sudoku();
        $newSudoku->origin = $this->origin;
        $newSudoku->candidates = $this->candidates;
        return $newSudoku;
    }
    
    
    function findNotEmpty() {
        for ($i = 0; $i <= 8; $i++) {
            for ($j = 0; $j <= 8; $j++) {
                if (count($this->candidates[$i][$j]) !== 0) {
                    return array($i,$j);
                }
            }
        }
    }
    
    public function solved() {
        for ($i = 0; $i <= 8; $i++) {
            for ($j = 0; $j <= 8; $j++) {
                if (count($this->candidates[$i][$j]) !== 0) {
                    return FALSE;
                }
            }
        }
        return true;
    }
    
    public function isValid() {
        for ($i = 0; $i <= 8; $i++) {
            for ($j = 0; $j <= 8; $j++) {
                if (count($this->candidates[$i][$j]) === 0 && $this->origin[$i][$j] === 0) {
                    return FALSE;
                }
            }
        }
        return true;
    }


    public function setOrigin() {
        for ($i = 0; $i <= 8; $i++) {
            for ($j = 0; $j <= 8; $j++) {
                if ($this->origin[$i][$j] !== 0) {
                    $this->setCandidates($i, $j, $this->origin[$i][$j]);
                } 
            }
        }
    }
    
    
    public function optimize() {
        $continue = false;
        for ($i = 0; $i <= 8; $i++) {
            for ($j = 0; $j <= 8; $j++) {
                if (count($this->candidates[$i][$j]) === 1) {
                    $candidates = array_keys($this->candidates[$i][$j]);
                    $this->origin[$i][$j] = $candidates[0];
                    $this->setCandidates($i, $j, $this->origin[$i][$j]);
                    $continue = true;
                } 
            }
        }
        if ($continue) {
            $this->optimize();
        }
    }

    public function setCandidates($i, $j, $value) {
        $this->candidates[$i][$j] = array();
        for ($a = 0; $a <= 8; $a ++) {
            unset($this->candidates[$i][$a][$value]);
            unset($this->candidates[$a][$j][$value]);
        }
        $groupI = intval($i/3);
        $groupJ = intval($j/3);
        for ($a = $groupI * 3; $a <= $groupI * 3 + 2; $a ++) {
            for ($b = $groupJ * 3; $b <= $groupJ *3 + 2; $b ++) {
                unset($this->candidates[$a][$b][$value]);
            }
        }
        return true;
    }
    public function createCandidates() {
        $candidate = array(1=>1,2=>1,3=>1,4=>1,5=>1,6=>1,7=>1,8=>1,9=>1);
        for ($i = 0; $i <= 8; $i++) {
            for ($j = 0; $j <= 8; $j++) {
                if ($this->origin[$i][$j] === 0) {
                    $this->candidates[$i][$j] = $candidate;
                } else {
                    $this->candidates[$i][$j] = array();
                }
                
            }
        }
    }
    
    public function __construct($matrix = '') {
        if ($matrix === '') {
            return;
        }
        $this->origin = array();
        $lines = explode(PHP_EOL, $matrix);
        foreach ($lines as $i => $line) {
            $this->origin[$i] = str_split($line);
            foreach ($this->origin[$i] as $j => $value) {
                $this->origin[$i][$j] = intval($value);
            }
        }
        $this->createCandidates();
        $this->setOrigin();
    }
    
    
    public function valid ($i, $j, $value) {
        for ($a = 0; $a <= 8; $a ++) {
            if ($this->tmp[$i][$a] === $value) {
                return false;
            }
            if ($this->tmp[$a][$j] === $value) {
                return false;
            }
        }
        $groupI = intval($i/3);
        $groupJ = intval($j/3);
        for ($a = $groupI * 3; $a <= $groupI * 3 + 2; $a ++) {
            for ($b = $groupJ * 3; $b <= $groupJ *3 + 2; $b ++) {
                if ($this->tmp[$a][$b] === $value) {
                    return false;
                }
            }
        }
        return true;
    }
}
