<?php

namespace App\Http\Controllers\Currency;

use App\Http\Controllers\Controller;
use App\Http\Requests\Currency\Exchange\IndexRequest;
use App\Http\Responses\Currency\Exchange\IndexResponse;
use App\Services\CurrencyExchangeService;

class ExchangeController extends Controller
{
    public function __construct(
        private CurrencyExchangeService $currencyExchangeService
    ) {
    }

    public function index(IndexRequest $request): IndexResponse
    {
        $amount = $this->currencyExchangeService->exchange(
            $request->getSource(),
            $request->getTarget(),
            $request->getAmount()
        );
        return new IndexResponse($amount);
    }
}
