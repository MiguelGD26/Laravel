@extends('plantilla.app')
@section('contenido')
<main class="app-main">
    <div class="container-fluid mt-4">

        <!-- Título -->
        <h2 class="mb-3">Listado de Usuarios</h2>

        <!-- Fila: Buscar a la izquierda | Nuevo Usuario a la derecha -->
        <div class="row mb-3 align-items-center">
            <div class="col-md-6">
                <form action="{{ route('users.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="texto" placeholder="Buscar usuario..."
                            value="{{ request('texto') }}">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i> Buscar
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('users.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-lg"></i> Nuevo Usuario
                </a>
            </div>
        </div>

        <!-- Mensaje de éxito -->
        @if (session('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Tabla -->
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 60px;">ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th class="text-end" style="width: 130px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($registros as $reg)
                            <tr>
                                <td>{{ $reg->id }}</td>
                                <td>{{ $reg->name }}</td>
                                <td>{{ $reg->email }}</td>
                                <td class="text-end">
                                    <div class="btn-group">
                                        <a href="{{ route('users.edit', $reg->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modal-delete-{{$reg->id}}">
                                            <i class="bi bi-trash-fill text-white"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @include('user.delete')
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">No se encontraron usuarios.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-end">
                {{ $registros->links() }}
            </div>
        </div>
    </div>
</main>
@endsection