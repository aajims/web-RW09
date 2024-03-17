<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriKeuangan extends Model
{
    use HasFactory;
    protected $table = 'kategori_keuangan';
    public $primaryKey = 'id';

    public function keuangans()
    {
        return $this->hasMany(Keuangan::class);
    }
}
