<?php
namespace App\Util;

class ConvertJsonToData
{
    private string $input;

    public function __construct(string $input)
    {
        $this->input = $input;
    }

    public function jsonToArray()
    {
        return json_decode($this->input, true, 512, JSON_THROW_ON_ERROR);
    }
}
