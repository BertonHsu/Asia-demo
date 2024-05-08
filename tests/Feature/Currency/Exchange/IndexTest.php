<?php

namespace Tests\Feature\Currency\Exchange;

use App\Http\Domains\Enums\Currency;
use App\Http\Responses\Currency\Exchange\IndexResponse;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class IndexTest extends TestCase
{
    #[Test]
    public function shouldSuccessfully(): void
    {
        $exceptAmount = '40.49';
        $response = $this->get($this->apiPath(
            Currency::TWD,
            Currency::USD,
            1234
        ));
        $response->assertOk()
            ->assertExactJson([
                'msg' => IndexResponse::SUCCESS_MSG,
                'amount' => $exceptAmount,
            ]);
    }

    private function apiPath(
        Currency $source,
        Currency $target,
        int $amount,
    ): string {
        return route('get.api.currency.exchange.index', [
            'source' => $source->value,
            'target' => $target->value,
            'amount' => $amount
        ]);
    }
}