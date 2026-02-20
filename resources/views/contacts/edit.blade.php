@extends('layouts.app')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <h1 style="margin-bottom: 1.5rem;">Editar Contacto</h1>

    <form method="POST" action="{{ route('contacts.update', $contact) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nome (mínimo 5 caracteres):</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $contact->name) }}" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="contact">Contacto (9 dígitos):</label>
            <input type="text" name="contact" id="contact" class="form-control" value="{{ old('contact', $contact->contact) }}" required maxlength="9">
            @error('contact')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $contact->email) }}" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('contacts.show', $contact) }}" class="btn btn-info">Ver</a>
            <a href="{{ route('contacts.index') }}" class="btn btn-warning">Cancelar</a>
        </div>
    </form>
</div>
@endsection
