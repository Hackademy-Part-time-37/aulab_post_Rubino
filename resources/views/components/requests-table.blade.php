<tbody>
    @foreach ($roleRequests as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @switch($role)
                    @case('amministratore')
                        <form action="{{ route('admin.setAdmin', $user) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-secondary">Attiva {{ $role }}</button>
                        </form>
                        @break
                    @case('revisore')
                        <form action="{{ route('admin.setRevisor', $user) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-secondary">Attiva {{ $role }}</button>
                        </form>
                        @break
                    @case('redattore')
                        <form action="{{ route('admin.setWriter', $user) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-secondary">Attiva {{ $role }}</button>
                        </form>
                        @break
                @endswitch
            </td>
        </tr>
    @endforeach
</tbody>