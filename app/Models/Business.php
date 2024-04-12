<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    // these are the only required fields for the Note model
    protected $fillable = [
        'name',  
        'phone',  
        'address',  
        'address2',  
        'city',  
        'state',  
        'zip_code', 
        'summary', 
        'description',  
        'business_type'
    ];
}
