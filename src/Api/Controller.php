<?php

namespace App\Api;

use App\Random\RandomDigit;
use App\Data\DigitStore;
use App\Api\Response;

/**
 * 
 */
class Controller
{
    
    function digit()
    {
        $store = new DigitStore();
        $id = $store->getNewId();
        $digit = new RandomDigit($id);
        $store->setData($digit);
        $store->save();

        Response::send($digit);
    }

    public function get(int $id)
    {
        $store = new DigitStore();

        try {

            $digit = $store->getById($id);
            Response::send($digit);

        } catch (\Throwable $th) {

            Response::notFound();

        }

    }

}
