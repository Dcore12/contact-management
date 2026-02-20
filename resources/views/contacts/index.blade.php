@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
    <h1>Lista de Contactos</h1>
    @auth
        <a href="{{ route('contacts.create') }}" class="btn btn-success">+ Novo Contacto</a>
    @endauth
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Contacto</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->contact }}</td>
                <td>{{ $contact->email }}</td>
                <td>
                    <a href="{{ route('contacts.show', $contact) }}" class="btn btn-primary">Ver</a>
                    @auth
                        <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-warning">Editar</a>
                        <form method="POST" action="{{ route('contacts.destroy', $contact) }}" class="inline-form" onsubmit="return confirm('Tem a certeza?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @endauth
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Nenhum contacto encontrado.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
