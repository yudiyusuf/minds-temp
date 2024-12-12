<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRequestmemo extends Model
{
    use HasFactory;

    protected $table = 'requestmemos';

    protected $fillable = [
        'memoname', 
        'jenis_internalmemo', 
        'disetujui', 
        'diketahui', 
        'boleh_dilihat',
        'memodesc',
        'user_id',
        'nominal',
        'nomor_internalmemo',
        'status_disetujui',
        'status_diketahui',
        'tgl_disetujui',
        'tgl_diketahui',
        'disetujui2', 
        'diketahui2', 
        'status_disetujui2',
        'status_diketahui2',
        'tgl_disetujui2',
        'tgl_diketahui2'
    ];

    protected $hidden = [

    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function mengetahui(){
        return $this->hasOne(User::class, 'id', 'diketahui');
    }

    public function menyetujui(){
        return $this->hasOne(User::class, 'id', 'disetujui');
    }

    public function mengetahui2(){
        return $this->hasOne(User::class, 'id', 'diketahui2');
    }

    public function menyetujui2(){
        return $this->hasOne(User::class, 'id', 'disetujui2');
    }


    public function computer(){
        return $this->hasOne(Computer::class, 'id', 'computer_id');
    }

    public function followed_up_request(){
        return $this->belongsTo(FollowedUpRequest::class, 'id', 'request_id');
    }

    public function gambarmemo(){
        return $this->hasMany(Filememo::class, 'nomor_internalmemo', 'nomor_internalmemo');
    }
}
