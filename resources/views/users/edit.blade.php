@extends('layouts.main')

@section('content')
    <div class="container">

        <form action="{{ route('usuarios.update') }}" method="post" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
            @csrf
            {{ method_field( 'PATCH' ) }}
            @include('users.form', [ 'modo' => 'Editar' ])
        </form>
    </div>
@endsection