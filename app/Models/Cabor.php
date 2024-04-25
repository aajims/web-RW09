<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabor extends Model
{
    use HasFactory;
    protected $table = "cabor";
    public $primaryKey = 'id';
    protected $fillable = [
        'name',
         'lokasi',
         'slug',
         'logo'
    ];
}
