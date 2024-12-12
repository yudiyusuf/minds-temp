<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'dept_code', 'name'
    ];

    protected $hidden = [

    ];

    public function depthead(){
        return $this->hasOne(User::class, 'id', 'dept_head');
    }

    public function secthead(){
        return $this->hasOne(User::class, 'id', 'sect_head');
    }

    public function bodhead(){
        return $this->hasOne(User::class, 'id', 'bod_head');
    }
}
