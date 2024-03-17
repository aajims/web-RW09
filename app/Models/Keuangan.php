<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Keuangan extends Model
{
    use HasFactory;
    protected $table = 'keuangan';
    public $primaryKey = 'id';

    /**
     * Get the kategori that owns the Keuangan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori_keuangan()
    {
        return $this->belongsTo(kategoriKeuangan::class, 'kategori_id');
    }
   
}
