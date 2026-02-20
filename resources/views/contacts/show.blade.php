@extends('layouts.app')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <h1 style="margin-bottom: 1.5rem;">Detalhes do Contacto</h1>

    <table style="width: 100%;">
        <tr>
            <th style="width: 120px; padding: 0.75rem; background: #f8f9fa;">ID:</th>
            <td style="padding: 0.75rem;">{{ $contact->id }}</td>
        </tr>
        <tr>
            <th style="padding: 0.75rem; background: #f8f9fa;">Nome:</th>
            <td style="padding: 0.75rem;">{{ $contact->name }}</td>
        </tr>
        <tr>
            <th style="padding: 0.75rem; background: #f8f9fa;">Contacto:</th>
            <td style="padding: 0.75rem;">{{ $contact->contact }}</td>
        </tr>
        <tr>
            <th style="padding: 0.75rem; background: #f8f9fa;">Email:</th>
            <td style="padding: 0.75rem;">{{ $contact->email }}</td>
        </tr>
        <tr>
            <th style="padding: 0.75rem; background: #f8f9fa;">Criado em:</th>
            <td style="padding: 0.75rem;">{{ $contact->created_at->format('d/m/Y H:i') }}</td>
        </tr>
        <tr>
            <th style="padding: 0.75rem; background: #f8f9fa;">Atualizado em:</th>
            <td style="padding: 0.75rem;">{{ $contact->updated_at->format('d/m/Y H:i') }}</td>
        </tr>
    </table>

    <div style="margin-top: 2rem; text-align: center;">
        @auth
            <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-warning">Editar</a>
            <form method="POST" action="{{ route('contacts.destroy', $contact) }}" class="inline-form" onsubmit="return confirm('Tem a certeza que deseja eliminar este contacto?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        @endauth
        <a href="{{ route('contacts.index') }}" class="btn btn-primary">Voltar à Lista</a>
    </div>
</div>
@endsection
