<?php
namespace App;

use App\Product;
use App\Contract\OfferInterface;
use App\Contract\OfferCollectionInterface;
use Iterator;

class ProductList implements OfferCollectionInterface
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

    public function get(int $index): OfferInterface
    {
        $data = $this->product_list[$index];

        return new Product($data);
    }

    public function getIterator(): Iterator
    {
        return $this;
    }
}
