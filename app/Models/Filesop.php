<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Filesop extends Model
{
    use HasFactory;

    protected $table ='filesops';
    protected $primaryKey = 'id';
    protected $fillable = array('nomor_sop','jenis_file','filename','created_at','updated_at');
}