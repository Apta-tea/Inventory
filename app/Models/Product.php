<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //use HasFactory;
    protected $fillable = [

        'users_id','product_name','category_id','sub_category_id','buying_price','selling_price','brand','specification',
        'purchaseType','assetType','serial_number','barcodeNumber','description','unit','qty',
        'file_picture','status',
    ];
}
