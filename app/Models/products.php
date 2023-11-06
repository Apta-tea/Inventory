<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    //use HasFactory;
    protected $fillable = [

        'users_id','product_name','category_id','sub_category_id','buying_price','selling_price','brand','specification',
        'purchaseType','assetType','serial_number','barcodeNumber','description','weight_per_product','size_per_product',
        'file_picture','status',
    ];
}
