<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;
    protected $table = 'poli';
    protected $fillable = ['jenis_poli'];
    protected $primaryKey = 'id_poli';
    public $timestamps = false;
}
