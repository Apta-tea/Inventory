<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_categorys extends Model
{
    //use HasFactory;
    protected $fillable = [

        'category_id','name','description','status',
    ];
}
