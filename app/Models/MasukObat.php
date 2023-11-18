<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasukObat extends Model
{
    use HasFactory;
    protected $table = 'masuk_obat';
    protected $fillable = ['tgl_expired'];
    protected $primaryKey = 'id_masuk_obat';
    public $timestamps = false;
}
