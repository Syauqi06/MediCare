<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resepobat extends Model
{
    use HasFactory;
    protected $table = 'resep_obat';
    protected $fillable = ['tgl_pembuatan_resep','status_pengambilan_obat'];
    protected $primaryKey = 'id_resep';
    public $timestamps = false;
}
