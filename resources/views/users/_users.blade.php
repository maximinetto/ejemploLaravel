<h2 class="mb-4"> {{ request()->routeIs('user.create') ? "Agregar" : "Editar" }} Persona </h2>
<form action="{{request()->routeIs('user.create') 
                ? route('user.store') 
                : route('user.update', $persona)}}" method="POST" class="needs-validation" novalidate>
    @if (request()->routeIs('user.edit'))
    @method('PUT')
    @endif

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" required value="{{old('nombre', $persona->nombre)}}">
            <div class="invalid-feedback">
                Escriba un nombre.
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" name="apellido" required
                value="{{old('apellido', $persona->apellido)}}">
            <div class="invalid-feedback">
                Escriba un apellido.
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="ci">Cédula de identidad</label>
        <input type="text" class="form-control" name="ci" required maxlength="8" value="{{old('ci', $persona->ci)}}">
        <div class="invalid-feedback">
            Escriba la cédula sin puntos ni guiones.
        </div>
    </div>
    <button type="submit" class="btn btn-primary">
        {{ request()->routeIs('user.create') ? 'Guardar' : 'Actualizar' }}
    </button>
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