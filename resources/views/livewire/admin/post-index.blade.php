<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre del post ">
    </div>
    @if($posts->count())
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th> {{ $post->id }} </th>
                        <th> {{ $post->name }} </th>
                        <th>
                            <a class="btn btn-primary btn-ms"href="{{ route('admin.post.edit', $post) }}">Editar</a>
                        </th>
                        <th>
                            <form action="{{ route('admin.post.destroy', $post) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-ms" type="submit">
                                    Eliminar
                                </button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{$posts->links()}}
    </div>
    @else

    <div class="card-body">
        <strong>
            No hay ningun registro...
        </strong>
    </div>

    @endif
    
</div>
