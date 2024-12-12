<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sop extends Model
{
    use HasFactory;

    protected $table = 'sops';

    protected $fillable = [
        'nomor_sop', 
        'namasop', 
        'kebijakan_spesifik', 
        'tujuan', 
        'ketentuan_proses',
        'alur_kerja',
        'disetujui',
        'diperiksa',
        'boleh_dilihat',
        'user_id',
        'status_disetujui',
        'status_diperiksa',
        'tgl_diperiksa',
        'tgl_disetujui', 
        'catatan_disetujui', 
        'catatan_diperiksa'
    ];

    protected $hidden = [

    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function meriksa(){
        return $this->hasOne(User::class, 'id', 'diperiksa');
    }

    public function menyetujui(){
        return $this->hasOne(User::class, 'id', 'disetujui');
    }

    public function gambaralurkerja(){
        return $this->hasMany(Filesop::class, 'nomor_sop', 'nomor_sop');
    }

    public function dokumenpendukung(){
        return $this->hasMany(Filedokumenpendukung::class, 'nomor_sop', 'nomor_sop');
    }


}
