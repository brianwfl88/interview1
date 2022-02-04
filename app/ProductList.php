<?php
namespace App;

use App\Product;
use Iterator;

class ProductList implements Iterator
{
    private $position = 0;
    private $data = [];

    public function __construct(array $data)
    {
        $this->position = 0;
        $this->data = $data;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function current(): mixed
    {
        return new Product($this->data[$this->position]);
    }

    public function key(): mixed
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function valid(): bool
    {
        return isset($this->data[$this->position]);
    }
}
