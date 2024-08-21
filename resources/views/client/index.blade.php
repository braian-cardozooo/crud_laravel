@extends('theme.base')

@section('content')
    <div class="container py-5 text-center b ">
        <h1 class="">Listado de Clientes</h1>
        <a href="{{ route('client.create') }}" class="btn btn-primary mt-n3 mb-3">Crear Cliente</a>

        @if (Session::has('mensaje'))
            <div class="alert alert-info my-5">
                {{ session::get('mensaje') }}
            </div>
        @endif

        <form action="{{ route('client.index') }}" method="GET" class="mb-4">
            <input type="text" name="search" class="form-control" placeholder="Buscar cliente..." value="{{ request()->query('search') }}">
            <button type="submit" class="btn btn-primary mt-2">Buscar</button>
        </form>

        <table class="table table-bordered table-hover border-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Saldo</th>
                    <th scope="col">Comentario</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @forelse ($clients as $detail)
                    <tr>
                        <th scope="row">{{ $detail->id }}</th>
                        <td>{{ $detail->name }}</td>
                        <td>{{ $detail->due }}</td>
                        <td> {{ $detail->moments }}</td>
                        <td>
                            <a href="{{ route('client.edit', $detail) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('client.destroy', $detail) }}" method="POST" class="d-inline">
                                @method("DELETE")
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar el cliente?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No hay registros</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if ($clients->count())
            <div class="text-center">
                {{ $clients->links() }}
            </div>
        @endif

    </div>
@endsection
