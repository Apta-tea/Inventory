<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable = [

        'issued_no','company_id','issued_date','user_id','description','internal_notes','amount',
    ];
}
