<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Filememo extends Model
{
    use HasFactory;

    protected $table ='filememos';
    protected $primaryKey = 'id';
    protected $fillable = array('nomor_internalmemo','filename','created_at','updated_at');
}