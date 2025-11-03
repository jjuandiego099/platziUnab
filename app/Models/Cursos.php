<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
     use HasFactory;

    use HasFactory;
    protected $table="cursos";
      protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'nivel',
        'categoria_id',
        'profesor_id',
        
    ];
    public $timestamps =true;
}
