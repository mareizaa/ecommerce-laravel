<?php

namespace App\Requests;

class CreateRequest extends GetInformationRequest
{
    public function url(?int $session_id)
    {
        return config('webcheckout.baseUrl').'/api/session';
    }

    public function toArray()
    {

    }
}
