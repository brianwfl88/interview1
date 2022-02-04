<?php
namespace App\Contract;

use App\Contract\OfferCollectionInterface;

interface ReaderInterface
{
    public function read(string $input): OfferCollectionInterface;
}
