<?php
namespace App;

use App\Contract\OfferCollectionInterface;

use FilterIterator;

class FilterByPriceRange extends FilterIterator
{
    private $start_price;
    private $end_price;
    private $error = false;

    public function __construct(OfferCollectionInterface $data)
    {
        parent::__construct($data->getIterator());
    }

    public function accept(): bool
    {
        return $this->current()->getPrice() >= $this->start_price && $this->end_price <= $this->current()->getPrice();
    }

    public function setParam(array $param)
    {
        if (empty($param[0]) === false
            && empty($param[1]) === false
            && is_numeric($param[0]) === true
            && is_numeric($param[1]) === true) {
            $this->start_price = floatval($param[0]);
            $this->end_price = floatval($param[1]);
        } else {
            $this->error = true;
        }
    }

    public function getCount()
    {
        return iterator_count($this);
    }

    public function isValid(): bool
    {
        return $this->error === false;
    }

    public function validatedMessage(): string
    {
        return 'The filter requires 2 argument and must be float';
    }
}
