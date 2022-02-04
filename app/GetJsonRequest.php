<?php
namespace App;

use App\Contract\ReaderInterface;
use App\Contract\OfferCollectionInterface;
use App\Util\ConvertJsonToData;
use App\Util\Log;
use App\ProductList;

class GetJsonRequest implements ReaderInterface
{
    public function fetchUrl(string $data)
    {
        return $this->read($data);
    }

    public function read(string $input): OfferCollectionInterface
    {
        $converter = new ConvertJsonToData($input);
        $data = [];

        try {
            $data = $converter->jsonToArray();
        } catch (\JsonException $e) {
            // write to log
            Log::error(Log::formatFromException($e));
        }

        return new ProductList($data);
    }
}
