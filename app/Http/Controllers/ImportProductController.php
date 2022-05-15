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
                $failure->row(); // row that went wrong
                $failure->attribute(); // either heading key (if using heading row concern) or column index
                $failure->errors(); // Actual error messages from Laravel validator
                $failure->values(); // The values of the row that has failed.
            }
        }

        //Excel::import(new ProductsImport(auth()->user()->id, $importAction), $request->file('file')->store(config('filesystems.files_disk')));
        return redirect('/')->with('success', 'All good!');
    }
}
