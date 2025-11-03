<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inscripcion extends Model
{
    use HasFactory;
    protected $table="inscripciones";
      protected $fillable = [
        'user_id',
        'curso_id',
        'progreso',
    ];
    public $timestamps =true;
}
