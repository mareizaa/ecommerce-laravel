<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:products.export');
    }

    public function export(): BinaryFileResponse
    {
        return Excel::download(new ProductsExport(), 'products.xlsx');
    }
}
