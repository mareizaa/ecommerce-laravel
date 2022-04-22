<?php

namespace App\Requests;

use Illuminate\Http\Request;

class CreateRequest extends GetInformationRequest
{
    public array $payment;
    public string $expiration;
    public string $returnUrl;

    public function __construct(array $data)
    {
        $this->payment = $data['payment'];
        $this->expiration = $data['expiration'];
        $this->returnUrl = $data['returnUrl'];
    }

    public function url(?int $session_id)
    {
        return config('webcheckout.baseUrl').'/api/session';
    }

    public function toArray()
    {
        return array_merge(parent::auth(), [
            'locale' => 'es_CO',
            'payment' => $this->payment,
            'expiration' => $this->expiration,
            'returnUrl' => $this->returnUrl,
            'ipAddress' => app(Request::class)->getClientIp(),
            'userAgent' => substr(app(Request::class)->header('User-Agent'), 0, 255)
        ]);
    }
}
