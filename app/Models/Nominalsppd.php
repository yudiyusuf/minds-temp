<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nominalsppd extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'uang_saku', 'uang_makan','name',
    ];

    protected $hidden = [

    ];
}
