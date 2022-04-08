<?php

namespace App\Requests;

use App\Contracts\WebcheckoutContract;
use Illuminate\Support\Str;

class GetInformationRequest implements WebcheckoutContract
{
    public function auth()
    {
        $seed = date('c');
        $nonce = Str::random(8);
        $tranKey = base64_encode(hash('sha1', $nonce.$seed.config('webcheckout.tranKey'), true));

        return [
            'auth' => [
                'login' => config('webcheckout.login'),
                'trankey' => $tranKey,
                'noce' => base64_encode($nonce),
                'seed' => $seed
            ]
        ];
    }

    public function url(?int $session_id)
    {
        return config('webcheckout.baseUrl').'/api/session/'.$session_id;
    }
}
