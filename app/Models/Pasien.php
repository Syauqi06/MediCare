<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasien';
    protected $fillable = ['nama_pasien','alamat','tgl_lahir','foto_ktp'];
    protected $primaryKey = 'id_pasien';
    public $timestamps = false;
}