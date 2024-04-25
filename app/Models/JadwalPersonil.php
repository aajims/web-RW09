<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPersonil extends Model
{
    use HasFactory;
    protected $table = 'jadwal_personil_security';

    protected $fillable = [
        'jadwal_id',
         'keamanan_id'
    ];
}
