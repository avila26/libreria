<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class libro extends Model
{
    use HasFactory;
    protected $table = 'libros';// libros ES EL NOMBRE DE LA TABLA DE LIBROS
    public $timestamps= false;
    protected $fillable = ['nombre', 'year', 'autor_id' ];
}
