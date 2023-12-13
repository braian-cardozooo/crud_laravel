@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        <h1 class="">listado de clientes</h1>
        <a href={{ route('client.create') }} class="btn btn-primary">crear cliente</a>
        @if (Session::has('mensaje'))
            <div class="alert alert-info my-5">
                {{ session::get('mensaje') }}
            </div>
        @endif
        <table class="table " >
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nombre</th>
                    <th scope="col">saldo</th>
                    <th scope="col">comentario </th>
                    <th scope="col">accion </th>
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
                            <a href="{{ route('client.edit', $detail) }}" class="btn btn-warning">editar</a>

                            <form action="{{ route('client.destroy', $detail) }}" method="POST" class="d-inline">
                                @method("DELETE")
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('estas seguro de eliminar el cliente?')">eliminar</button>
                               
                            </form>
                            
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="3">no hay registro</td>
                </tr>
                @endforelse


            </tbody>
        </table>
        @if ($clients->count())
            <div class="text center">
                {{ $clients->links() }}
            </div>
        @endif

    </div>
@endsection
