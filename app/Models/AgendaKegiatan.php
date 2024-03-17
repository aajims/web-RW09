<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaKegiatan extends Model
{
    use HasFactory;
    protected $table = 'agenda_kegiatan';
    public $primaryKey = 'id';

    /**
     * Get all of the foto for the AgendaKegiatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function foto()
    {
        return $this->hasMany(Foto::class);
    }
}
