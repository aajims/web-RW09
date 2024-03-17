<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    use HasFactory;
    protected $table = 'rt';
    public $primaryKey = 'id';

    
    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'id');
    }
}
