<?php

namespace App\Random;

class RandomDigit
{
    public $id;
    public $digit;

    public function __construct(int $id, int $digit=0)
    {
        $this->id = $id;
        
        if ($digit === 0) {
            $this->digit = rand();
        } else {
            $this->digit = $digit;
        }
    }

}