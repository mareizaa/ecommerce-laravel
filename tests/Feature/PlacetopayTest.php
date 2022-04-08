<?php

namespace Tests\Feature;

use App\Requests\GetInformationRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlacetopayTest extends TestCase
{
    public function testGetInformationRequest()
    {
        $resquest = (new GetInformationRequest())->auth();
        dd($resquest);
    }
}
