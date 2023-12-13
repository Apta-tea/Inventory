<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;
    protected $fillable = [

        'stored_id','product_id','item_price','item_quantity','item_total',
    ];
}
