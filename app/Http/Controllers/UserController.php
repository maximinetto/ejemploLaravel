<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller{
    public function editar($idUser){
        return "Id user: $idUser";
    }

    public function mostrarTodos(){
        $users = DB::select("SELECT * FROM personas");
        return view("welcome", ["users" => $users]);
    }
}