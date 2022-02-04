<?php
namespace App\Contract;

interface OfferInterface
{
    public function getVendorId(): int;
    public function getPrice(): float;
}
