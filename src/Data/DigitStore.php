<?php

namespace App\Data;

use App\Random\RandomDigit;

class DigitStore
{
    private $filename = __DIR__ . '\data.json';
    private $digits = [];

    function __construct()
    {
        $this->open();
    }

    private function open()
    {
        if (file_exists($this->filename)) {
            $this->digits = unserialize(file_get_contents($this->filename));
        }
    }

    public function setData(RandomDigit $digit)
    {

        if (empty($this->digits)) 
        {
            $this->digits = array($digit);
        } else {
            array_push($this->digits, $digit);
        }
        
    }
    
    public function getById(int $id) : RandomDigit
    {
        foreach ($this->digits as $digit) {
            if ($digit->id == $id) {
                return $digit;
            }
        }
        
        throw new Exception("Not Found");
    }

    public function getNewId() : int
    {
        return count($this->digits) + 1;
    }

    public function save()
    {
        file_put_contents($this->filename, serialize($this->digits));
    }
}