<?php

namespace App\Data;

class Store
{
    private $filename = __DIR__ . '\data.json';
    private $data = [];

    function __construct()
    {
        $this->open();
    }

    private function open()
    {
        if (file_exists($this->filename)) {
            $this->data = unserialize(file_get_contents($this->filename));
        }
    }

    public function setData($data)
    {

        if (empty($this->data)) 
        {
            $this->data = array($data);
        } else {
            array_push($this->data, $data);
        }
        
    }
    
    public function getByIndex($index)
    {
        if (isset($this->data[$index])) {
            return $this->data[$index];
        }

        return NULL;
    }

    public function save()
    {
        file_put_contents($this->filename, serialize($this->data));
    }
}