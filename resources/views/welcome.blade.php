@extends('layouts.layout')
@section("cabecera")

@endsection

@section('main')

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Cédula</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $persona)
        <tr>
            <th scope="row"> {{ $persona->id }} </th>
            <td> {{ $persona->nombre }} </td>
            <td> {{ $persona->apellido }} </td>
            <td> {{ $persona->ci }} </td>
            <td>
                <button class="btn btn-success" id="{{ "persona-$persona->id" }}">
                    <i class="fas fa-user-edit"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection