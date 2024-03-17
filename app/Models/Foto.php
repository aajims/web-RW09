<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $table = "foto";
    public $primaryKey = 'id';

    /**
     * Get the agenda that owns the Foto
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agenda()
    {
        return $this->belongsTo(AgendaKegiatan::class, 'agenda_id');
    }

}
