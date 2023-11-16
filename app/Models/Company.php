<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //use HasFactory;
    protected $fillable = [

        'company_name','address','country','city','state','zip','file_company_logo','file_report_logo','file_report_background','report_footer'
    ];
}
