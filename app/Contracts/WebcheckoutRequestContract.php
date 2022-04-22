<?php

namespace App\Contracts;

interface WebcheckoutRequestContract
{
    public function url(?int $session_id);
}
