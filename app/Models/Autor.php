<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class autor extends Model
{
    use HasFactory;
    protected $table = 'autors'; // autors ES EL NOMBRE DE LA TABLA DE LIBROS
    public $timestamps= false;


}
