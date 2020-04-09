@extends('layouts.layout')
@section("cabecera")

@endsection

@section('main')

<h2 class="mb-4"> {{ request()->path('user') ? "Agregar" : "Editar" }} Persona </h2>
<form method="POST" action="/user/procesar" class="needs-validation" novalidate>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" required value="{{old('nombre')}}">
            <div class="invalid-feedback">
                Escriba un nombre.
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" name="apellido" required value="{{old('apellido')}}">
            <div class="invalid-feedback">
                Escriba un apellido.
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="ci">Cédula de identidad</label>
        <input type="text" class="form-control" name="ci" required maxlength="8" value="{{old('ci')}}">
        <div class="invalid-feedback">
            Escriba la cédula sin puntos ni guiones.
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    @csrf
</form>

@if ($errors->any())
<div class="alert alert-danger mt-5">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection