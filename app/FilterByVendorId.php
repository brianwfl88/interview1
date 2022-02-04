<?php
namespace App;

use App\Contract\OfferCollectionInterface;
use FilterIterator;

class FilterByVendorId extends FilterIterator
{
    private $vendor_id;
    private $error = false;

    public function __construct(OfferCollectionInterface $data)
    {
        parent::__construct($data->getIterator());
    }

    public function accept(): bool
    {
        return parent::current()->getVendorId() === $this->vendor_id;
    }

    public function setParam(array $param)
    {
        if (empty($param[0]) === false && is_numeric($param[0])) {
            $this->vendor_id = intval($param[0]);
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
        return 'The filter requires 1 argument and must be integer';
    }
}
