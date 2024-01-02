<?php


class Bebras {

    public $spalva = 'ruda';
    private $svoris = 'nezinomas'; // dar nepasverem

    public function koksSvoris() {
        return $this->svoris;
    }
 
    public function pasverti()  {
        $this->svoris = rand(5, 45);
    }


}