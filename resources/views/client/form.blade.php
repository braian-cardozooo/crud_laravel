@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        @if (isset($client))
            <h1 class="">Editar Clientes</h1>
        @else
            <h1 class="">Listar Clientes</h1>
        @endif

        <form action="{{ isset($client) ? route('client.update', $client) : route('client.store') }}" method="POST">
            @csrf
            @if (isset($client))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="name" class="form-name">Nombre</label>
                <input type="text" name="name" placeholder="Introduce tu nombre" class="form-control"
                    value="{{ old('name', $client->name ?? '') }}">
                @error('name')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="due" class="form-name">Saldo</label>
                <input type="number" name="due" placeholder="Introduce tu saldo" class="form-control" step="0.01"
                    value="{{ old('due', $client->due ?? '') }}">
                @error('due')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="moments" class="form-name">Comentario</label>
                <textarea name="moments" cols="30" rows="4" placeholder="Introduce tu comentario"
                    class="form-control">{{ old('moments', $client->moments ?? '') }}</textarea>
                @error('moments')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-info">
                {{ isset($client) ? 'Editar Cliente' : 'Guardar Cliente' }}
            </button>
        </form>
    </div>
@endsection
