<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logs extends Model
{
    use HasFactory;
    protected $table = 'logs';
    protected $fillable = ['tabel', 'tanggal', 'jam', 'aksi', 'record'];
    protected $primaryKey = 'id_log'; 
    public $timestamps = false;
}
