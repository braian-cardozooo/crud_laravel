@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        @if (isset($client))
            <h1 class="">editar clientes</h1>
        @else
            <h1 class="">listar clientes</h1>
        @endif

        @if (isset($client))
            <form action="{{ route('client.update', $client) }}" method="POST">
                @method('PUT')
            @else
                <form action="{{ route('client.store') }}" method="POST">
        @endif


        @csrf
        <div class="mb-3">
            <label for="name" class="form-name">nombre</label>
            <input type="text" name="name" placeholder="Introduce tu nombre" class="form-control"
                value="{{ old('name') ?? @$client->name }}">
            @error('name')
                <p class="form-text text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="due" class="form-name">saldo</label>
            <input type="number" name="due" placeholder="Introduce tu saldo" class="form-control" step="0.01"
                value="{{ old('due') ?? @$client->due }}">
            @error('due')
                <p class="form-text text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="moments" class="form-lable" class="form-name">contario</label>
            <textarea name="moments" id="" cols="30" rows="4" placeholder="Introduce tu comentario"
                class="form-control">{{ old('moments') ?? @$client->moments }}</textarea>
            @error('moments')
                <p class="form-text text-danger">{{ $message }}</p>
            @enderror
        </div>

        @if (isset($client))
            <button type="submit" class=" btn btn-info">editar cliente</button>
        @else
            <button type="submit" class=" btn btn-info">guardar cliente</button>
        @endif




        </form>
    </div>
@endsection
