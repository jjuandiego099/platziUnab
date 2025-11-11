<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leccion extends Model
{
    use HasFactory;
    protected $table = "lecciones";
    protected $fillable = [
        'curso_id',
        'titulo',
        'video_url',
        'contenido',
        'orden',
    ];
    public $timestamps = true;
   
}
