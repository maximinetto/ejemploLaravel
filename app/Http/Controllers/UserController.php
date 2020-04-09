<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Persona;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller{
    public function editar($idUser){
        return "Id user: $idUser";
    }

    public function mostrarTodos(){
        $users = Persona::all();
        return view("welcome", ["users" => $users]);
    }

    public function store(){
        $persona = new Persona();
        request()->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'ci' => 'required|max:8'
        ], [
            'ci.max' => 'La cédula no puede tener más de 8 caracteres'
        ]);

        $name = request('nombre');
        $lastname = request('apellido');
        $ci = request('ci');
        $persona->nombre = $name;
        $persona->apellido = $lastname;
        $persona->ci = $ci;

        $salvado = $persona->save();
        return $salvado ? Redirect::to("/") : Redirect::to("user"); 
    }
}