<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    use HasFactory;
    protected $fillable = [

        'production_no','supplier_id','stored_date','user_id','description','internal_notes','amount',
    ];
}
