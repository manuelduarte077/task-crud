@extends('plantilla')


@section('content')

    <div class="row">

        <div class="col-md-7">
            <table class="table">

                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>

                @foreach ($notas as $nota)
                    <tr>
                        <td>{{ $nota->id }}</td>
                        <td>{{ $nota->nombre }}</td>
                        <td>{{ $nota->descripcion }}</td>
                        <td>
                            <a href="{{ route('edit' , $nota->id) }}" class="btn btn-warning">Editar</a>

                            <form action="{{ route('eliminar' , $nota->id) }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf

                                <button type="submit" class="btn btn-danger">Eliminar</button>

                            </form>

                        </td>
                    </tr>
                @endforeach

            </table>


            @if (session('eliminar'))
                <div class="alert alert-info mt-4" role="alert">
                    {{ session('eliminar') }}
                </div>
            @endif

            {{ $notas->links() }}

        </div>



        <div class="col-md-5"> {{-- Fila formulario --}}
            <h3 class="text-center">Agregar Notas</h3>

            <form action="{{ route('store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="my-input">Nombre</label>
                    <input id="nombre" class="form-control" type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" placeholder="Nombre de la nota">
                </div>

                @error('nombre')
                    <div class="alert alert-danger" role="alert">
                        El nombre es requerido
                    </div>
                @enderror

                <div class="form-group">
                    <label for="my-input">Descripcion</label>
                    <input id="descripcion" class="form-control" type="text" name="descripcion" class="form-control" value="{{ old('descripcion') }}" placeholder="Descripcion de la nota">
                </div>


                @error('descripcion')
                    <div class="alert alert-danger" role="alert">
                       La descripcion es requerida
                    </div>
                @enderror

                <button type="submit" class="btn btn-success btn-block">Save Task</button>

            </form>

            @if (session('agregar'))
                <div class="alert alert-success mt-4" role="alert">
                    {{ session('agregar') }}
                </div>
            @endif

        </div>{{-- FIn Fila formulario --}}
    </div>

@endsection
