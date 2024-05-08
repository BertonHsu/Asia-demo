<?php

namespace App\Http\Requests\Currency\Exchange;

use App\Http\Domains\Enums\Currency;
use App\Http\Exceptions\ValidationFailedException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexRequest extends FormRequest
{
    protected function failedValidation(Validator $validator): void
    {
        throw (new ValidationFailedException())
            ->details($validator->errors()->getMessages());
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'source' => [
                'required',
                Rule::enum(Currency::class)
            ],
            'target' => [
                'required',
                Rule::enum(Currency::class)
            ],
            'amount' => [
                'required',
                'regex:/[0-9]+[,]?[0-9]*/'
            ]
        ];
    }

    public function getSource(): Currency
    {
        return Currency::from($this->input('source'));
    }
    public function getTarget(): Currency
    {
        return Currency::from($this->input('target'));
    }
    public function getAmount(): int
    {
        return (int) str_replace(",","",$this->input('amount'));
    }
}
