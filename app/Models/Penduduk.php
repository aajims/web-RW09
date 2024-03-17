<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;
    protected $table = 'penduduk';
    public $primaryKey = 'id';

   
    public function rts()
    {
        return $this->belongsTo(Rt::class, 'rt_id');
    }
}
