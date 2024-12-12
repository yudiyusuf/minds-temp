<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dashboardmind extends Model
{
    use HasFactory;

    protected $fillable = [
        'url', 'name', 'description', 'user_id'
    ];

    protected $hidden = [

    ];
}
