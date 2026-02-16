<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class students extends Model
{
    protected $fillable = [
        'nom',
        'file',
        'gestion_stagiaire_id'
    ];

    public function gestionStagiaire(): BelongsTo{
        return $this->belongsTo(gestionStagiaire::class,'gestion_stagiaires','id' );
    }

    public function modules(){
        return $this->belongsToMany(Module::class);
    }
}
