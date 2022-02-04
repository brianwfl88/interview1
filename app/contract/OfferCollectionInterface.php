<?php
namespace App\Contract;

use Iterator;
use App\Contract\OfferInterface;

interface OfferCollectionInterface extends Iterator
{
    public function get(int $index): OfferInterface;
    public function getIterator(): Iterator;
}
