<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resepsionis extends Model
{
    use HasFactory;
    protected $table = 'respsionis';
    protected $fillable = ['nama_respsionis','foto_respsionis','no_telp'];
    protected $primaryKey = 'id_respsionis';
    public $timestamps = false;
}
