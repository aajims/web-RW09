<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;
    protected $table = 'keuangan';
    public $primaryKey = 'id';

   
    public function kategori_keuangan()
    {
        return $this->belongsTo(KategoriKeuangan::class, 'kategori_id');
    }
   
}
