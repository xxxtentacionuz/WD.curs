<?php

namespace backend\models;

class telegram
{
    public function getData()
    {
        $data = json_decode(file_get_contents('php://input'),true);
        return $data;
    }

}