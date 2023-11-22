<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;
    protected $table = 'rekam_medis';
    protected $fillable = ['id_dokter','id_pendaftaran','diagnosa','tgl_pemeriksaan'];
    protected $primaryKey = 'id_rm';
    public $timestamps = false;
}
