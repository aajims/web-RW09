<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;
    protected $table = "dokumen";
    public $primaryKey = 'id';
    protected $fillable = [
        'title',
        'slug',
         'content'
    ];

}
