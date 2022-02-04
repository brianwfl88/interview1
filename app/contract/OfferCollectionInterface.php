<?php
namespace App\Contract;

use Iterator;
use App\Contract\OfferInterface;

interface OfferCollectionInterface
{
    public function get(int $index):? OfferInterface;
    public function getIterator(): Iterator;
}
