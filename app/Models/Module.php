<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Module extends Model
{   use HasFactory, Notifiable;
    protected $fillable = [
        'nom',
        'masse',
    ];
    
    public function students(){
        return $this->belongsToMany(students::class);
    }
}
