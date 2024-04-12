<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    // these are the only required fields for the Note model
    protected $fillable = [
        'note', 'user_id'
    ];
}
