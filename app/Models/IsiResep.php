<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsiResep extends Model
{
    use HasFactory;
    protected $table = 'isi_resep';
    protected $fillable = ['aturan_pemakaian','dosis'];
    protected $primaryKey = 'id_isi_resep';
    public $timestamps = false;
}
