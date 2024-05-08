<?php

namespace Tests\Unit\Http\Responses\Currency\Exchange;

use App\Http\Responses\Currency\Exchange\IndexResponse;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use TypeError;

class IndexResponseTest extends TestCase
{
    #[Test]
    public function shouldGetResponseSuccessfully(): void
    {
        $amount = 12345.67;
        $response = new IndexResponse($amount);
        $data = $response->getData(true);

        $this->assertSame(IndexResponse::SUCCESS_MSG, $data['msg']);
        $this->assertSame(number_format($amount, 2), $data['amount']);
    }

    #[Test]
    public function shouldGetTypeErrorException(): void
    {
        $amount = 'string';
        $this->expectException(TypeError::class);
        new IndexResponse($amount);
    }
}