<?php
require './vendor/autoload.php';

use App\FilterByPriceRange;
use App\FilterByVendorId;
use App\GetJsonRequest;

$keyword = $argv[1];

switch ($keyword) {
    case 'count_by_price_range':
        $request = new GetJsonRequest;
        $data = $request->fetchUrl(file_get_contents('./test/data.json'));

        $filter = new FilterByPriceRange($data);

        $filter->setParam(
            array_slice($argv, 2)
        );

        if ($filter->isValid()) {
            echo $filter->getCount() . PHP_EOL;
        } else {
            echo $filter->validatedMessage() . PHP_EOL;
        }

        break;
    
    case 'count_by_vendor_id':
        $request = new GetJsonRequest;
        $data = $request->fetchUrl(file_get_contents('./test/data.json'));

        $filter = new FilterByVendorId($data);

        $filter->setParam(
            array_slice($argv, 2)
        );

        if ($filter->isValid()) {
            echo $filter->getCount() . PHP_EOL;
        } else {
            echo $filter->validatedMessage() . PHP_EOL;
        }

        break;
    default:
        echo 'no keyword specified' . PHP_EOL;
}
