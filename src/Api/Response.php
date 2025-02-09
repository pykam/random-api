<?php

namespace App\Api;


class Response
{
    public static function send($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public static function notFound() {
        header("HTTP/1.1 404 Not Found");
    }
}