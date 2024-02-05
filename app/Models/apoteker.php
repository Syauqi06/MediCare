<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apoteker extends Model
{
    use HasFactory;
    protected $table = 'apoteker';
    protected $fillable = ['nama_apoteker','foto_apoteker','no_telp'];
    protected $primaryKey = 'id_apoteker';
    public $timestamps = false;
}
