<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Akun extends Authenticatable
{
    use HasFactory;
    protected $table = 'akun';
    protected $fillable = ['username','password','role'];
    protected $primaryKey = 'id_akun';
    protected $casts = [
        'password' => 'hashed'
    ];
    public $timestamps = false;
}
