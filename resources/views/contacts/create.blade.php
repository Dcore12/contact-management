@extends('layouts.app')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <h1 style="margin-bottom: 1.5rem;">Novo Contacto</h1>

    <form method="POST" action="{{ route('contacts.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="contact">Contacto (9 dígitos):</label>
            <input type="text" name="contact" id="contact" class="form-control" value="{{ old('contact') }}" required maxlength="9">
            @error('contact')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('contacts.index') }}" class="btn btn-warning">Cancelar</a>
    </form>
</div>
@endsection
