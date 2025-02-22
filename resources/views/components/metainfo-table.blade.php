<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome tag</th>
            <th scope="col">N. articoli collegati</th>
            <th scope="col">Aggiorna</th>
            <th scope="col">Cancella</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($metaInfos as $metaInfo)
            <tr scope="row">
                <td>{{ $metaInfo->id }}</td>
                <td>{{ $metaInfo->name }}</td>
                <td>{{ count($metaInfo->articles) }}</td>
                
                @if ($metaType == 'tags')
                    <td>
                        <form action="{{ route('admin.editTag', ['tag' => $metaInfo]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="name" placeholder="Nuovo nome tag" class="form-control" />
                            <button type="submit" class="btn btn-secondary">Modifica</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin.deleteTag', ['tag' => $metaInfo]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                @else
                    <td>
                        <form action="{{ route('admin.editCategory', ['category' => $metaInfo]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="name" placeholder="Nuovo nome categoria" class="form-control w-50" />
                            <button type="submit" class="btn btn-secondary">Aggiorna</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin.deleteCategory', ['category' => $metaInfo]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>