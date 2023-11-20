<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apoteker extends Model
{
    use HasFactory;
    protected $table = 'apoteker';
    protected $fillable = ['nama_apoteker','id_akun','foto_apoteker','no_telp'];
    protected $primaryKey = 'id_apoteker';
    public $timestamps = false;

    public function akun()
    {
        return $this->belongsTo(Akun::class);
    }
    public function getUsernameAttribute()
    {
        return Akun::find($this->attributes['id_akun'])->username;
    }
}
