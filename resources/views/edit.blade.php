@extends('plantilla')


@section('content')
    <h3 class="text-center mb-3 pt-3">Editar la nota {{ $notaUpdate->id }}</h3>

    <form action="{{ route('update' , $notaUpdate->id) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="my-input">Nombre</label>
            <input id="nombre" class="form-control" type="text" name="nombre" value="{{ $notaUpdate->nombre }}">
        </div>

        <div class="form-group">
            <label for="my-input">Descripcion</label>
            <input id="descripcion" class="form-control" type="text" name="descripcion" value="{{ $notaUpdate->descripcion }}">
        </div>

        <button type="submit" class="btn btn-warning btn-block">Editar</button>

    </form>

    @if (session('update'))
        <div class="alert alert-primary mt-4" role="alert">
            {{ session('update') }}
        </div>
    @endif

@endsection

