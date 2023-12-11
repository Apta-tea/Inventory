<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_purchase extends Model
{
    //use HasFactory;
    protected $fillable = [

        'purchase_id','product_id','item_cost','item_quantity','item_total',
    ];
}
