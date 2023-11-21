<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsistenDokter extends Model
{
    use HasFactory;
    protected $table = 'asisten_dokter';
    protected $fillable = ['id_akun','nama_asdok','foto_asdok','no_telp'];
    protected $primaryKey = 'id_asdok';
    public $timestamps = false;
}
