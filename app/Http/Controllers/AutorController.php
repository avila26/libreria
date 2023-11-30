<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\autor;

class AutorController extends Controller
{   
     public function index(){ //funcion de mostrar
        $autores= Autor::where('estado',true)->get();
        return view('persona.autor', compact('autores'));
    }

    
    public function registrar(Request $request){
        $autor= new Autor();//creamos una instancia del MODEL autor
        $autor-> nombre= $request->nombre; //nombre ES EL NAME DEL FORMULARIO
        $autor->save();
        return back();
    }



    public function eliminar($id){
        $autor= Autor::find($id);
        if($autor){
            $autor->estado = false;
            $autor->save();
            return back();
        }
    }

    public function actualizar($id, Request $request){
        $autor= Autor::find($id);
        if($autor){
            $autor->nombre=$request->nombre;
            $autor->save();
            //return back();
            return redirect('/');
        }
    }

    public function showAutor($id){ 
        $autor = Autor::find($id);
        return view('persona.personaedit',compact('autor'));//R
        
    }
}
