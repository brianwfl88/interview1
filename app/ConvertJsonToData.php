<?php
namespace App;

use App\Contract\OfferCollectionInterface;
use App\Contract\OfferInterface;
use App\ProductList;
use App\Product;
use Iterator;

class ConvertJsonToData implements OfferCollectionInterface
{
    protected array $product_list = [];
    private string $input;

    public function __construct(string $input)
    {
        $this->input = $input;
    }

    public function jsonToArray()
    {
        $data = json_decode($this->input, true, 512, JSON_THROW_ON_ERROR);

        $this->product_list = $data;
    }

    public function get(int $index):? OfferInterface
    {
        $data = $this->product_list[$index];

        return new Product($data);
    }

    public function getIterator(): Iterator
    {
        return new ProductList($this->product_list);
    }
}
