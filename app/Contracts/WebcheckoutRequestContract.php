<?

namespace App\Contracts;

interface WebcheckoutContract
{
    public function url(?int $session_id);
}
