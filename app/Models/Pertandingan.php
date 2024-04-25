<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertandingan extends Model
{
    use HasFactory;
    protected $table = "pertandingan";
    public $primaryKey = 'id';

    public function cabors()
    {
        return $this->belongsTo(Cabor::class, 'cabor_id');
    }
}
