<?php

namespace App\Exports;

use App\Models\Material;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
//use Maatwebsite\Excel\Concerns\FromCollection;

class MaterialExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function view(): View
    {
        return view('Staff/Material/print_template', [
            'material' => Material::orderBy('id','desc')->take(50)->get()
        ]);

    }
}
