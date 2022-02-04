<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use App\FilterByPriceRange;
use App\GetJsonRequest;

final class CountByPriceRangeTest extends TestCase
{
    public function testCountIsCorrect(): void
    {
        $request = new GetJsonRequest;
        $data = $request->fetchUrl(file_get_contents('./test/data.json'));

        $filter = new FilterByPriceRange($data);

        $filter->setParam([12.00, 145.80]);

        $this->assertEquals($filter->getCount(), 2);
    }

    public function testParameterIsInvalid(): void
    {
        $request = new GetJsonRequest;
        $data = $request->fetchUrl(file_get_contents('./test/data.json'));

        $filter = new FilterByPriceRange($data);

        $filter->setParam(['aaa', 'bbb']);

        $this->assertEquals($filter->isValid(), false);
    }
}
