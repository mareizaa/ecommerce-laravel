<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Actions\UpdateProductAction;
use App\Models\Product;
use App\Actions\StoreProductImagesAction;
use Illuminate\Http\Request;

class ImportProductController extends Controller
{
    public function import(Request $request)
    {
        Excel::import(new ProductsImport(auth()->user()->id), $request->file('file')->store(config('filesystems.files_disk')));

        return redirect('/')->with('success', 'All good!');
    }
}
