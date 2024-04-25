<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keamanan extends Model
{
    use HasFactory;
    protected $table = 'keamanan';
    public $primaryKey = 'id';
    protected $fillable = [
        'name',
         'foto',
         'jabatan_id',
         'periode'
    ];
   public function jabatans()
   {
       return $this->belongsTo(Jabatan::class, 'jabatan_id');
   }

   public function jadwals() 
   {
    return $this->belongsToMany(Jadwal::class, 'jadwal_personil_security');
   }
}
