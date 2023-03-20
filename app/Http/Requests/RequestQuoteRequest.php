<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class RequestQuoteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'newsletter' => ['boolean'],
            'visualiser' => ['array'],
        ];
    }
}
