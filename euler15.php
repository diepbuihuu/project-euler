<?php

$lattice = new Lattice();

echo $lattice->getPath(20, 20);

class Lattice {
    private $ref;
    public function __construct() {
        $this->ref = array();
    }
    
    function getPath($ver, $hor) {
        if ($ver === 0 || $hor === 0) {
            return 1;
        }
        
        if (isset($this->ref[$ver][$hor])) {
            return $this->ref[$ver][$hor];
        }
        
        $result = $this->getPath($ver - 1, $hor) + $this->getPath($ver, $hor - 1);
        $this->ref[$ver][$hor] = $result;
        return $result;
    }
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
