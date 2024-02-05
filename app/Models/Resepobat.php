<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resepobat extends Model
{
    use HasFactory;

    protected $table = 'resep_obat';
    protected $fillable = ['id_dokter','id_tipe','id_rm','tgl_pembuatan_resep','status_pengambilan_obat'];
    protected $primaryKey = 'id_resep';
    public $timestamps = false;

    public function isiresep()
    {
        return $this->belongsTo(IsiResep::class);
    }

    public function getIsiResepAttribute()
    {
        return IsiResep::find($this->attributes['id_isi_resep'])->isi_resep;
    }

}
