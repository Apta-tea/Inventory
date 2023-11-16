<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //use HasFactory;
    protected $fillable = [

        'purchase_no','supplier_id','date_of_purchase','users_id','description','internal_notes','total_cost','amount_paid',
    ];


}
