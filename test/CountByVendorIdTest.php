<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use App\FilterByVendorId;
use App\GetJsonRequest;

final class CountByVendorIdTest extends TestCase
{
    public function testCountIsCorrect(): void
    {
        $request = new GetJsonRequest;
        $data = $request->fetchUrl(file_get_contents('./test/data.json'));

        $filter = new FilterByVendorId($data);

        $filter->setParam([84]);

        $this->assertEquals($filter->getCount(), 1);
    }

    public function testParameterIsInvalid(): void
    {
        $request = new GetJsonRequest;
        $data = $request->fetchUrl(file_get_contents('./test/data.json'));

        $filter = new FilterByVendorId($data);

        $filter->setParam(['aaa']);

        $this->assertEquals($filter->isValid(), false);
    }
}
