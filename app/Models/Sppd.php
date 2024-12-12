<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sppd extends Model
{
    use HasFactory;

    protected $table = 'sppds';

    protected $fillable = [
        'nomor_sppd', 
        'nomor_internalmemo', 
        'pekerjaan', 
        'tujuan', 
        'penginapan',
        'transportasi',
        'tgl_berangkat',
        'tgl_kembali',
        'jumlah_hari',
        'user_id',
        'uang_saku',
        'total_uang',
        'mengetahui_id',
        'penerima_tugas1', 
        'penerima_tugas2', 
        'penerima_tugas3',
        'penerima_tugas4',
        'pemberi_tugas1',
        'pemberi_tugas2',
        'pemberi_tugas3',
        'pemberi_tugas4',
        'mengetahui',
        'status_mengetahui',
        'status_penerima_tugas1',
        'status_penerima_tugas2',
        'status_penerima_tugas3',
        'status_penerima_tugas4',
        'status_pemberi_tugas1',
        'status_pemberi_tugas2',
        'status_pemberi_tugas3',
        'status_pemberi_tugas4',
        'boleh_dilihat',
        'biaya_operasional',
        'uangmakan_penerima1',
        'uangmakan_penerima2',
        'uangmakan_penerima3',
        'uangmakan_penerima4',
        'tgl_pemberitugas1',
        'tgl_pemberitugas2',
        'tgl_pemberitugas3',
        'tgl_pemberitugas4',
        'tgl_diterimatugas1',
        'tgl_diterimatugas2',
        'tgl_diterimatugas3',
        'tgl_diterimatugas4',
        'tgl_mengetahui'
    ];

    protected $hidden = [

    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function mengetahui(){
        return $this->hasOne(User::class, 'id', 'mengetahui_id');
    }

    public function menyetujui(){
        return $this->hasOne(User::class, 'id', 'disetujui');
    }

    public function penerimatugassatu(){
        return $this->hasOne(User::class, 'id', 'penerima_tugas1');
    }

    public function penerimatugasdua(){
        return $this->hasOne(User::class, 'id', 'penerima_tugas2');
    }

    public function penerimatugastiga(){
        return $this->hasOne(User::class, 'id', 'penerima_tugas3');
    }

    public function penerimatugasempat(){
        return $this->hasOne(User::class, 'id', 'penerima_tugas4');
    }

    public function pemberitugassatu(){
        return $this->hasOne(User::class, 'id', 'pemberi_tugas1');
    }

    public function pemberitugasdua(){
        return $this->hasOne(User::class, 'id', 'pemberi_tugas2');
    }

    public function pemberitugastiga(){
        return $this->hasOne(User::class, 'id', 'pemberi_tugas3');
    }

    public function pemberitugasempat(){
        return $this->hasOne(User::class, 'id', 'pemberi_tugas4');
    }

}
