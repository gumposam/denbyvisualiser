<?php

namespace App\Mail;

use App\DataTransferObjects\RequestQuoteData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuoteRequestedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public RequestQuoteData $quote;

    public function __construct(RequestQuoteData $quote)
    {
        $this->quote = $quote;
    }

    public function build(): QuoteRequestedMail
    {
        return $this->markdown('emails.quote-requested');
    }
}
