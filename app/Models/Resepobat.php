<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepObat extends Model
{
    use HasFactory;
    protected $table = 'resepobat';
    protected $fillable = ['id_dokter','id_obat','id_asdok','id_rm','tgl_pembuatan_resep','status_pengambilan_obat'];
    protected $primaryKey = 'id_resep';
    public $timestamps = false;
}
