<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $table = 'obat';
    protected $fillable = ['nama_obat','id_tipe','stock_obat','foto_obat'];
    protected $primaryKey = 'id_obat';
    public $timestamps = false;
    public function tipe()
    {
        return $this->belongsTo(Tipe::class);
    }
    public function getTipeAttribute()
    {
        return Tipe::find($this->attributes['id_tipe'])->nama_tipe;
    }
}
