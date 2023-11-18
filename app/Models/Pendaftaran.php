<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran';
    protected $fillable = ['tgl_pendaftaran','nomor_antrian'];
    protected $primaryKey = 'id_pendaftaran';
    public $timestamps = false;
}
