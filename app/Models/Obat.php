<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $table = 'obat';
    protected $fillable = ['nama_obat','jenis_obat','stock_obat'];
    protected $primaryKey = 'id_obat';
    public $timestamps = false;
}
