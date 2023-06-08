@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar un rol</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route' => ['admin.role.update', $role], 'method' => 'put']) !!}
            @include('admin.role.partials.form')
            {!! Form::submit('Actualizar  rol', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
