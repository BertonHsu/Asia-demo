<?php

namespace Tests\Unit;

use App\Http\Domains\Dtos\Currencies;
use App\Http\Domains\Enums\Currency;
use App\Services\CurrencyExchangeService;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Mockery;
use Mockery\MockInterface;
use TypeError;

class CurrencyExchangeServiceTest extends TestCase
{
    private Currencies&MockInterface $currencies;

    private CurrencyExchangeService $targetService;

    public function setUp(): void
    {
        $this->currencies = Mockery::mock(Currencies::class);
        $this->targetService = new CurrencyExchangeService(
            $this->currencies
        );
    }

    #[Test]
    public function shouldExchangeCurrencySuccessfully(): void
    {
        $expect = 26956.0;
        $actual = $this->targetService->exchange(
            Currency::JPY,
            Currency::TWD,
            100000
        );
        $this->assertSame($expect, $actual);
    }

    #[Test]
    public function shouldOnlyGetDecimalTwoPlace(): void
    {
        $expect = 500.35;
        $actual = $this->targetService->exchange(
            Currency::TWD,
            Currency::USD,
            15250
        );
        $this->assertSame($expect, $actual);
    }

    #[Test]
    public function shouldGetCurrencyTypeErrorException(): void
    {
        $this->expectException(TypeError::class);
        $this->targetService->exchange(
            'bad string',
            'bad string',
            15250
        );
    }

    #[Test]
    public function shouldGetAmountTypeErrorException(): void
    {
        $this->expectException(TypeError::class);
        $this->targetService->exchange(
            Currency::TWD,
            Currency::USD,
            'bad string'
        );
    }
}
