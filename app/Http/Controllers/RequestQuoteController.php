<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\RequestQuoteData;
use App\Http\Requests\RequestQuoteRequest;
use App\Mail\QuoteRequestedMail;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class RequestQuoteController extends Controller
{
    public function __invoke(RequestQuoteRequest $request)
    {
        $data = new RequestQuoteData([
            'firstName' => $request->input('first_name'),
            'lastName' => $request->input('last_name'),
            'email' => $request->input('email'),
            'contactNumber' => $request->input('contact_number'),
            'additional_information' => $request->input('additional_information'),
            'visualiser' => $request->input('visualiser'),
        ]);

        Mail::to('sales@denbycampervans.com')
            ->send(new QuoteRequestedMail($data));

        return redirect()->back();
    }
}
