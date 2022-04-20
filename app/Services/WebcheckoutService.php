<?php

namespace App\Services;

use App\Contracts\WebcheckoutRequestContract;
use App\Requests\CreateRequest;
use App\Requests\GetInformationRequest;
use GuzzleHttp\Client;

class WebcheckoutService
{
    public Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getInformation(?int $session_id)
    {
        $getInformation = new GetInformationRequest();
        $data = $getInformation->auth();
        $url = $getInformation->url($session_id);
        return $this->request($data, $url);
    }

    public function createSession(array $data)
    {
        $createRequest = new CreateRequest($data);

        $data = $createRequest->toArray();
        $url = $createRequest->url(null);
        return $this->request($data, $url);
    }

    private function request(array $data, string $url)
    {
        $response = $this->client->request('post', $url, [
            'json' => $data,
            'verify' => false
        ]);
        $content = $response->getBody()->getContents();
        return json_decode($content, true);
    }
}
