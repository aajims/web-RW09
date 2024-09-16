<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KarangTaruna extends Model
{
    use HasFactory;
    protected $table = 'taruna';
    public $primaryKey = 'id';
    public function jabatans()
   {
       return $this->belongsTo(Jabatan::class, 'jabatan_id');
   }

}
