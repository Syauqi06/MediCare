<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasukObat extends Model
{
    use HasFactory;
    protected $table = 'masuk_obat';
    protected $fillable = ['tgl_expired','id_obat','jumlah_masuk','tgl_masuk_obat'];
    protected $primaryKey = 'id_masuk_obat';
    public $timestamps = false;

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
    public function getObatAttribute()
    {
        return Obat::find($this->attributes['id_obat'])->nama_obat;
    }
}
