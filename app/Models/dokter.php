<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table = 'dokter';
    protected $fillable = ['id_poli','id_akun','nama_dokter','foto_dokter','no_telp'];
    protected $primaryKey = 'id_dokter';
    public $timestamps = false;
}
