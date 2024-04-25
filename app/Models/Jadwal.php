<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    public $primaryKey = 'id';
    protected $fillable = [
        'hari',
         'jam_mulai',
         'jam_selesai',
         'keamanan_id'
    ];

    public function petugas()
    {
        return $this->belongsToMany(Keamanan::class, 'jadwal_personil_security');
    }
}
