<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;
    protected $table = 'rekam_medis';
    protected $fillable = ['hasil_diagnosa','tgl_diagnosa'];
    protected $primaryKey = 'id_rm';
    public $timestamps = false;
}
