<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
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
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
    public function profesor()
    {
        return $this->belongsTo(User::class, 'profesor_id');
    }
}
