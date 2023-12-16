<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_material extends Model
{
    use HasFactory;
    protected $fillable = [

        'issued_id','product_id','item_price','item_quantity','item_total',
    ];
}
