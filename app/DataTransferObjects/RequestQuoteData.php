<?php

namespace App\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class RequestQuoteData extends DataTransferObject
{
    public string $firstName;
    public string $lastName;
    public string $email;
    public ?string $contactNumber = null;

    public array $visualiser;
}
