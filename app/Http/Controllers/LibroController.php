<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\libro;
use App\Models\autor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;

class LibroController extends Controller
{

    public function index(){ //funcion de mostrar
        $autor = Autor::where('estado',1)->get();
        $libro= DB::table('libros')
        ->join('autors', 'autor_id', '=','autors.id')
         ->where('libros.estado', 1)
         ->select('libros.*', 'libros.nombre as nombre_libro', 'autors.nombre as nombre_autor')
         ->get();
         return view('librito.libro',compact('libro', 'autor'));
    }

    public function registrar(Request $request){//SaveLibro
        
        $datos= new Libro();//creamos una instancia del MODEL autor
        $datos-> nombre= $request-> nombre; //nombre ES EL NAME DEL FORMULARIO
        $datos-> year= $request->year;
        $datos-> estado= true;
        $datos-> autor_id = $request->autor_id;
        $datos->save();

        return back();  
    }


    public function showLibro(){ //Mostrar autor
        $autor = Autor::where('estado',1)->get();
        $libro= DB::table('libros')
        ->join('autors', 'autor_id', '=','autors.id')
         ->where('libros.estado', 1)
         ->select('libros.*', 'libros.nombre as nombre_libro', 'autors.nombre as nombre_autor')
         ->get();
         return view('librito.libro',compact('libro', 'autor'));//  
     }


    //nuevo funcion de chatgpt
    // public function showLibro(){ 
    //     $autores = Autor::where('estado', 1)->get();
    //     $libros = Libro::where('estado', 1)->with('autor')->get();
    //     return view('librito.libro', compact('libros', 'autores'));
    // }


    public function eliminar($id){
        $libro= Libro::find($id);
        if($libro){
            $libro->estado = false;
            $libro->save();
            return back();
        }
    }

    public function actualizar($id){   //Actualizar
        $autor = Autor::where('estado',1)->get();
        $libro = Libro::find($id);
        if($id)
        {
            return view('librito.libroedit', compact('libro', 'autor'));
        }   
       // return redirect('/');           return back();
    }


    // public function updateLibro( Request $request, $id){  //updateLibro
    // $Nuevosdatos = Libro::find($id);
    // if($Nuevosdatos){
    //     $Nuevosdatos-> update([
    //         "nombre"   => $request-> input("nombre"),
    //         "year"     => $request-> input("year"),
    //         "autor_id" => $request-> input("autor_id")  
    //     ]);
    // }
    // return redirect('mostrar');//datos SERA UNA RUTA
    // }


    //nueva funcion de chatgpt
    public function updateLibro(Request $request, $id){
        $libro = Libro::find($id);
        if($libro){
            $libro->update([
                "nombre"   => $request->input("nombre"),
                "year"     => $request->input("year"),
                "autor_id" => $request->input("autor_id")  
            ]);
    
            // Puedes agregar un mensaje de sesión
            return redirect('mostrar')->with('success', 'Libro actualizado exitosamente.');
        }
        return redirect('mostrar')->with('error', 'Libro no encontrado.');
    }


    public function filtrar(Request $request){
        $autor = Autor::where('estado',1)->get();
        $libros= DB::table('libros')
        ->join('autors', 'autor_id', '=','autors.id')
        ->where('libros.estado', 1)
        ->where('autors.id', '=', $request->datoFiltrado)
        ->select('libros.*', 'libros.nombre as nombre_libro', 'autors.nombre as nombre_autor')
        ->get();

        return view('librito.tabla',compact('libros', 'autor'));//  
    }
    
}


