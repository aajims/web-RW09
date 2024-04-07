<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keamanan extends Model
{
    use HasFactory;
    protected $table = 'keamanan';
    public $primaryKey = 'id';

   /**
    * Get the jabatans that owns the Pengurus
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function jabatans()
   {
       return $this->belongsTo(Jabatan::class, 'jabatan_id');
   }
}
