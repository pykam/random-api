<?php

namespace App\Random;

class RandomDigit
{
    public function get(): int
    {
        return rand();
    }
}