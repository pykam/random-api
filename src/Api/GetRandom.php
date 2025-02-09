<?php

namespace App\Api;

use App\Random\RandomDigit;
use App\Data\Store;
use App\Api\Response;

class GetRandom
{
    function digit()
    {
        $digit = (new RandomDigit())->get();
        $store = new Store();
        $store->setData($digit);
        $store->save();

        Response::send($digit);
    }
}