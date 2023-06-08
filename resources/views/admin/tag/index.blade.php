@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a class="btn btn-secondary btn-ms float-right" href="{{route('admin.tag.create')}}">Nueva Etiqueta</a>
    <h1>Mostrat listado de Etiqueta</h1>
@stop

@section('content')
@if(session('info'))
	<div class="alert alert-success">
		<strong>
			{{session('info')}}
		</strong>
	</div>
@endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-ms" href="{{ route('admin.tag.edit', $tag) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.tag.destroy', $tag) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-ms" type="submit">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

