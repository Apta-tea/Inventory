<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suppliers extends Model
{
    //use HasFactory;
    protected $fillable = [

        'company','supplier_name','email','address','city','state','zip','phone_no',
    ];


}
