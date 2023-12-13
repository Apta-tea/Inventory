<?php

namespace App\Exports;

use App\Models\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
//use Maatwebsite\Excel\Concerns\FromCollection;

class InvoiceExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('Staff/Invoice/print_template', [
            'invoice' => Invoice::orderBy('id','desc')->take(50)->get()
        ]);
        //return Invoice::all();
    }
}
