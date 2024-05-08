<?php

namespace Tests\Unit\Http\Requests\Currency\Exchange;

use App\Http\Domains\Enums\Currency;
use App\Http\Exceptions\ValidationFailedException;
use App\Http\Requests\Currency\Exchange\IndexRequest;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class IndexRequestTest extends TestCase
{
    private IndexRequest&MockInterface $request;

    public function setUp(): void
    {
        parent::setUp();
        $this->request = Mockery::mock(IndexRequest::class)
            ->makePartial()
            ->setContainer(app());;
        $this->request->shouldReceive('isPrecognitive')->andReturns(false);
    }

    #[Test]
    public function validRequest(): void
    {
        $this->expectNotToPerformAssertions();

        $this->request->allows('all')
            ->andReturns([
                'source' => Currency::TWD->value,
                'target' => Currency::USD->value,
                'amount' => '123456',
            ]);

        $this->request->validateResolved();
    }

    #[DataProvider('invalidRequestProvider')]
    #[Test]
    public function invalidRequest(array $request): void
    {
        $this->expectException(ValidationFailedException::class);

        $this->request->allows('all')
            ->andReturns($request);

        $this->request->validateResolved();
    }

    public static function invalidRequestProvider(): array
    {
        return [
            'Invalid type' => [
                [
                    'source' => 111,
                    'target' => 222,
                    'amount' => 'string',
                ],
            ],
            'Invalid string' => [
                [
                    'source' => 'bad string',
                    'target' => 'bad string',
                    'amount' => 111,
                ],
            ],
        ];
    }
}