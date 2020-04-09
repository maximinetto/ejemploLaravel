<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Persona;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller{
    
    public function mostrarTodos(){
        $users = Persona::all();
        return view("welcome", ["users" => $users]);
    }

    public function store(){
        
        self::validateForm();
        $persona = new Persona();

        $name = request('nombre');
        $lastname = request('apellido');
        $ci = request('ci');
        $persona->nombre = $name;
        $persona->apellido = $lastname;
        $persona->ci = $ci;

        $salvado = $persona->save();
        return $salvado ? Redirect::to("/") : Redirect::to("user"); 
    }

    public function update(Persona $persona){
        self::validateForm();

        $exito = $persona->update([
            'nombre' => request('nombre'),
            'apellido' => request('apellido'),
            'ci' => request('ci')
        ]);

        return $exito ? redirect('/') : redirect('user/$persona->id');
    }

    public function crear(){
        return view("user_form", [  
           "persona" => new Persona()
        ]);
    }

    public function editar($idUser){
        $persona = Persona::find($idUser);
        return view("user_form", [  
            "persona" => $persona
        ]);
    }

    private function validateForm(){
        request()->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'ci' => 'required|max:8'
        ], [
            'ci.max' => 'La cédula no puede tener más de 8 caracteres'
        ]);
    }

}