@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        <h1 class="">hola mundo!</h1>
        <a href={{ route('client.index') }} class="btn btn-primary">cliente</a>
    </div>
@endsection