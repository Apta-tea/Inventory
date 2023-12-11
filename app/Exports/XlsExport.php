<?php

namespace App\Exports;

use App\Models\Purchase;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
//use Maatwebsite\Excel\Concerns\FromCollection;

class XlsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('Staff/Purchase/print_template', [
            'purchase' => Purchase::orderBy('id','desc')->take(50)->get()
        ]);
        //return Purchase::all();
    }
}
