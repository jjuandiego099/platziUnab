<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    use HasFactory;
    protected $table="certificados";
    protected $fillable = [
        'user_id',
        'curso_id',
        'url_certificado',
        'emitido_en',
    ];
    public $timestamps =true;
}
