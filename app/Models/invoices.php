<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoices extends Model
{
    //use HasFactory;
    protected $fillable = [

        'invoice_no','customers_id','date_of_invoice','users_id','description','internal_notes','total_cost','amount_paid',
    ];

    
}
