@extends('layouts.tabler') 
@section('content')
<div class="plage-header">
    <h1>Listado de peliculas</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado de peliculas</h3>
                <div class="ml-auto">
                    <a href="{{ route('movies.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Agregar pelicula</a>
                </div>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Director</th>
                            <th>Cast</th>
                            <th>Clasificacion</th>
                            <th>Categoria</th>
                            <th>Duracion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($movies->isEmpty())
                        <div class="alert alert-danger" role="alert">
                            No se encontraron peliculas
                        </div>
                        @else @foreach($movies as $movie)
                        <tr>
                            <td>{{ $movie->id }}</td>
                            <td>{{ $movie->title }}</td>
                            <td>{{ $movie->description }}</td>
                            <td>{{ $movie->director }}</td>
                            <td>{{ $movie->cast }}</td>
                            <td>{{ $movie->clasification }}</td>
                            <td>{{ $movie->category }}</td>
                            <td>{{ $movie->duration_min }} minutos</td>

                            <td>
                                <div class="input-group-append">
                                    <button type="button" data-toggle="dropdown" class="btn btn-sm btn-warning dropdown-toggle">Acciones</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('movies.edit', $movie->id) }}">
                                                Editar
                                              </a>
                                        <div class="dropdown-divider"></div>
                                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE"> @csrf
                                            <button type="submit" class="dropdown-item">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection