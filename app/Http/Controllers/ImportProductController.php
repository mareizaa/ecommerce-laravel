<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\ImportProductAction;
use Illuminate\Http\RedirectResponse;

class ImportProductController extends Controller
{
    public function import(Request $request, ImportProductAction $importAction): RedirectResponse
    {
        $file = $request->file('file')->store(config('filesystems.files_disk'));
        try {
            $import = new ProductsImport(auth()->user()->id, $importAction);
            $import->import($file);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            dd($failures);

            foreach ($failures as $failure) {
                $failure->row();
                $failure->attribute();
                $failure->errors();
                $failure->values();
            }
        }
        return redirect('/')->with('success', 'All good!');
    }
}
