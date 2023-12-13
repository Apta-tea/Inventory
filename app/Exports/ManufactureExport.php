<?php

namespace App\Exports;

use App\Models\Manufacture;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
//use Maatwebsite\Excel\Concerns\FromCollection;

class ManufactureExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('Staff/Manufacture/print_template', [
            'manufacture' => Manufacture::orderBy('id','desc')->take(50)->get()
        ]);

    }
}
