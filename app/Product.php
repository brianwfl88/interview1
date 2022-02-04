<?php
namespace App;

use App\Contract\OfferInterface;

class Product implements OfferInterface
{
    private $detail = [];

    public function __construct(array $detail)
    {
        $this->detail['offerId'] = $detail['offerId'];
        $this->detail['productTitle'] = $detail['productTitle'];
        $this->detail['vendorId'] = intval($detail['vendorId']);
        $this->detail['price'] = floatval($detail['price']);
    }

    public function getDetail()
    {
        return $this->detail;
    }

    public function getVendorId(): int
    {
        return $this->detail['vendorId'];
    }

    public function getPrice(): float
    {
        return $this->detail['price'];
    }
}
