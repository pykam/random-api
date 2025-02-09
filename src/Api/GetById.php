<?php

namespace App\Api;

use App\Data\Store;
use App\Api\Response;

class GetById
{
    public function get(int $id)
    {
        $store = new Store();
        $digit = $store->getByIndex(intval($id)-1);
        if ($digit) {
            Response::send($digit);
        } else {
            Response::notFound();
        }
    }
}